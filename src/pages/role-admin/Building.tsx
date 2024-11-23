import { FC, useEffect, useRef, useState } from "react";
import { Helmet } from "react-helmet";
import { AdminSidebar } from "../../components/common/AdminSidebar";
import { NavbarHandles, PageNavbar } from "../../components/common/PageNavbar";
import { apiAdminGetBuilding, apiAdminUpdateFloor, apiAdminUpdateRooms, apiGetFaculty } from "../../helpers/axios";
import { useToast } from "../../components/common/CustomToast";
import { closestCenter, DndContext, DragEndEvent, DragOverlay, DragStartEvent, rectIntersection } from "@dnd-kit/core";
import { arrayMove, SortableContext, verticalListSortingStrategy } from "@dnd-kit/sortable";
import DraggableFloor from "../../components/pages/role-admin/Building/DraggableFloor";
import DraggableRoom from "../../components/pages/role-admin/Building/DraggableRoom";
import { FieldArray, Formik, FormikHelpers, FormikProps, Form } from "formik";
import { CustomInput, SelectOptionType } from "../../components/common/CustomInput";
import { CustomModal, CustomModalHandles } from "../../components/common/CustomModal";
import { faTrash } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { FacultyListType } from "./Faculty";

export type FloorType = {
  floor_id: string;
  floor_order: number;
  floor_name: string;
  floor_note: string | null;
  created_at: string;
  updated_at: string;
  status: string;
};
export type RoomType = {
  room_id: string;
  room_order: number;
  room_name: string;
  floor_id: string;
  faculty_id: string;
  room_size: string;
  room_price: string;
  created_at: string;
  updated_at: string;
  status: string;
};
export type FloorFormType = {
  name?: string,
  desc?: string | null
}
export type FloorRequestType = FloorFormType & {
  order?: string,
  action: string,
  floor_id: string | null
}
export type RoomFormType = {
  name?: string,
  fac_id?: string | null,
  size?: string,
  price?: string
}
export type RoomRequestType = RoomFormType & {
  order: string,
  floor_id: string,
  room_id?: string
}
export type RoomAPIRequestType = {
  action: string,
  room_id?: string,
  request?: RoomRequestType[]
}

type DynamicRoomFormType = {
  rooms: RoomFormType[];
}

export type BuildingType = FloorType & {
  rooms: RoomType[]
}

export const AdminBuilding: FC = () => {
  const {openToast} = useToast();

  const navbarRef = useRef<NavbarHandles>(null);
  const [buildingList, setBuildingList] = useState<BuildingType[]>([]);
  const [editMode, setEditMode] = useState<boolean>(false);
  const [facultyOptions, setFacultyOptions] = useState<SelectOptionType[]>([]);

  // Create/Edit floor states
  const [updateFloorId, setUpdateFloorId] = useState<string | null>(null);
  const floorModalRef = useRef<CustomModalHandles>(null);
  const floorDeleteAlertRef = useRef<CustomModalHandles>(null);
  const floorFormRef = useRef<FormikProps<FloorFormType>>(null);
  const [floorInitialValue, setFloorInitialValue] = useState<FloorFormType>({
    name: "",
    desc: "",
  })

  const toggleFloorDeleteAlert = (action: string, floorId?:string) => {
    if (floorDeleteAlertRef.current) {
      switch (action) {
        case "open":
          setUpdateFloorId(floorId ? floorId : null);
          floorDeleteAlertRef.current.openModal();
          break;
        case "close":
          floorDeleteAlertRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }
  const toggleFloorModal = (action: string, floorId?: string) => {
    switch (action) {
      case "open":
        floorFormRef.current?.resetForm();
        setUpdateFloorId(floorId ? floorId : null);
        if(floorId) {
          const getFloor = buildingList.find(bFloor => bFloor.floor_id === floorId);
          if(getFloor) {
            setFloorInitialValue({
              name: getFloor.floor_name,
              desc: getFloor.floor_note
            })
            if(floorModalRef.current) {
              floorModalRef.current.openModal();
            }
          }
        } else {
          floorFormRef.current?.resetForm();
          setFloorInitialValue({
            name: "",
            desc: "",
          })
          if(floorModalRef.current) {
            floorModalRef.current.openModal();
          }
        }
        break;
      case "close":
        if(floorModalRef.current) {
          floorModalRef.current.closeModal();
        }
        break;

      default:
        break;
    }
  }
  const validateFloor = (value: FloorFormType) => {
    let errors: FloorFormType = {};
    if (!value.name) {
      errors.name = "Trường này không được bỏ trống!";
    }
    if (!value.desc) {
      errors.desc = "Trường này không được bỏ trống!";
    }
    return errors;
  }
  const submitFloor = async(value:FloorFormType, action:string) => {
    let order = 0;
    if(action === "update") {
      const getFloor = buildingList.find(bFloor => bFloor.floor_id === updateFloorId);
      if(getFloor) {
        order = getFloor.floor_order;
      }
    }
    if(action === "create") {
      order = buildingList[0].floor_order + 1;
    }
    const request: FloorRequestType = {
      ...value,
      action: action,
      floor_id: updateFloorId,
      order: order.toString()
    }
    const updateResponse = await apiAdminUpdateFloor(request);
    if(updateResponse.error) {
      openToast("error", "Lỗi", updateFloorId ? "Đã xảy ra lỗi khi cập nhật tầng!" : "Đã xảy ra lỗi khi tạo tầng!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", updateFloorId ? "Tầng đã được cập nhật" : "Tầng đã được tạo!", 5000);
      toggleFloorModal("close");
      getBuilding();
    }
  }
  const deleteFloor = async() => {
    const request: FloorRequestType = {
      action: "delete",
      floor_id: updateFloorId
    }
    const updateResponse = await apiAdminUpdateFloor(request);
    if(updateResponse.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi xoá tầng!", 5000);
    } else if (updateResponse.data) {
      openToast("success", "Thành công", "Tầng đã được xoá!", 5000);
      toggleFloorDeleteAlert("close");
      getBuilding();
    }
  }

  // Create/Edit room states
  const [updateRoomFloor, setUpdateRoomFloor] = useState<FloorType | null>(null);
  const [updateRoomId, setUpdateRoomId] = useState<string | null>(null)
  const roomDeleteAlertRef = useRef<CustomModalHandles>(null);;
  const roomCreateModalRef = useRef<CustomModalHandles>(null);
  const roomCreateFormRef = useRef<FormikProps<DynamicRoomFormType>>(null);
  const [roomCreateInitialValue, setRoomCreateInitialValue] = useState<DynamicRoomFormType>({
    rooms: [
      {
        name: "",
        fac_id: "",
        size: "",
        price: ""
      }
    ]
  })
  const roomUpdateModalRef = useRef<CustomModalHandles>(null);
  const roomUpdateFormRef = useRef<FormikProps<RoomFormType>>(null);
  const [roomUpdateInitialValue, setRoomUpdateInitialValue] = useState<RoomFormType>({
    name: "",
    fac_id: "",
    size: "",
    price: ""
  })

  const submitCreateRoom = async(value:DynamicRoomFormType, helpers: FormikHelpers<DynamicRoomFormType>) => {
    let formValid = true;
    value.rooms.every(room => {
      if(!room.name || room.size === "" || room.price === "") {
        formValid = false;
        return false;
      }
      return true;
    })
    if(formValid && updateRoomFloor) {
      const getFloor = buildingList.find(floor => floor.floor_id === updateRoomFloor.floor_id);
      if(getFloor) {
        let newRoomOrder = getFloor.rooms[getFloor.rooms.length - 1].room_order + 1;
        let roomRequest: RoomRequestType[] = [];
        value.rooms.forEach(room => {
          roomRequest.push({
            ...room,
            order: newRoomOrder.toString(),
            floor_id: updateRoomFloor.floor_id
          })
          newRoomOrder++;
        })
        const createResult = await apiAdminUpdateRooms({
          action: "create",
          request: roomRequest
        })
        if(createResult.error) {
          openToast("error", "Lỗi", "Đã xảy ra lỗi khi tạo phòng!", 5000);
        } else if (createResult.data) {
          helpers.resetForm();
          openToast("success", "Thành công", `Các phòng đã được tạo trên ${updateRoomFloor.floor_name}!`, 5000);
          toggleRoomModal("close");
          getBuilding();
        }
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Một số phòng chưa điền đủ thông tin!", 5000);
    }
  }
  const submitUpdateRoom = async(value:RoomFormType, helpers: FormikHelpers<RoomFormType>) => {
    if(updateRoomFloor && updateRoomId && value.name !== "" && value.size !== "" && value.price !== "") {
      const getFloor = buildingList.find(floor => floor.floor_id === updateRoomFloor.floor_id);
      if(getFloor) {
        let newRoomOrder = getFloor.rooms[getFloor.rooms.length - 1].room_order + 1;
        let roomRequest: RoomRequestType[] = [{
          ...value,
          fac_id: value.fac_id === "none" ? null : value.fac_id,
          order: newRoomOrder.toString(),
          floor_id: updateRoomFloor.floor_id,
          room_id: updateRoomId
        }];
        const updateResult = await apiAdminUpdateRooms({
          action: "update",
          request: roomRequest
        })
        if(updateResult.error) {
          openToast("error", "Lỗi", "Đã xảy ra lỗi khi cập nhật phòng!", 5000);
        } else if (updateResult.data) {
          helpers.resetForm();
          openToast("success", "Thành công", `Phòng đã được cập nhật!`, 5000);
          toggleRoomModal("close");
          getBuilding();
        }
      }
    } else {
      openToast("error", "Lỗi biểu mẫu", "Phòng chưa điền đủ thông tin!", 5000);
    }
  }

  const toggleRoomModal = (action: string, floor?: FloorType, roomId?:string) => {
    switch (action) {
      case "open":
        roomCreateFormRef.current?.resetForm();
        setUpdateRoomFloor(floor ? floor : null);
        setUpdateRoomId(roomId ? roomId : null);
        if(roomId && floor) {
          const getFloor = buildingList.find(bFloor => bFloor.floor_id === floor.floor_id);
          if(getFloor) {
            const findRoom = getFloor.rooms.find(bRoom => bRoom.room_id === roomId);
            if(findRoom) {
              setRoomUpdateInitialValue({
                name: findRoom.room_name,
                fac_id: findRoom.faculty_id ? findRoom.faculty_id : "none",
                size: findRoom.room_size,
                price: findRoom.room_price
              })
              if(roomUpdateModalRef.current) {
                roomUpdateModalRef.current.openModal();
              }
            }
          }
        } else {
          roomCreateFormRef.current?.resetForm();
          setRoomCreateInitialValue({
            rooms: [
              {
                name: "",
                fac_id: "",
                size: "",
                price: ""
              }
            ]
          })
          if(roomCreateModalRef.current) {
            roomCreateModalRef.current.openModal();
          }
        }
        break;
      case "close":
        if(roomCreateModalRef.current) {
          roomCreateModalRef.current.closeModal();
        }
        if(roomUpdateModalRef.current) {
          roomUpdateModalRef.current.closeModal();
        }
        break;

      default:
        break;
    }
  }
  const toggleRoomDeleteAlert = (action: string, floorId?:string, roomId?:string) => {
    if (roomDeleteAlertRef.current) {
      switch (action) {
        case "open":
          setUpdateFloorId(floorId ? floorId : null);
          setUpdateRoomId(roomId ? roomId : null);
          roomDeleteAlertRef.current.openModal();
          break;
        case "close":
          roomDeleteAlertRef.current.closeModal();
          break;

        default:
          break;
      }
    }
  }
  const deleteRoom = async() => {
    if(updateRoomId) {
      const request: RoomAPIRequestType = {
        action: "delete",
        room_id: updateRoomId
      }
      const updateResponse = await apiAdminUpdateRooms(request);
      if(updateResponse.error) {
        openToast("error", "Lỗi", "Đã xảy ra lỗi khi xoá phòng!", 5000);
      } else if (updateResponse.data) {
        openToast("success", "Thành công", "Phòng đã được xoá!", 5000);
        toggleRoomDeleteAlert("close");
        getBuilding();
      }
    }
  }

  const getFloorInfo = () => {
    if(updateFloorId) {
      const getFloor = buildingList.find(bFloor => bFloor.floor_id === updateFloorId);
      if(getFloor) {
        return getFloor.floor_name;
      }
    }
  }
  const getRoomInfo = () => {
    if(updateRoomId) {
      const getFloor = buildingList.find(bFloor => bFloor.floor_id === updateFloorId);
      if(getFloor) {
        const getRoom = getFloor.rooms.find(bRoom => bRoom.room_id === updateRoomId);
        if(getRoom) {
          return getRoom.room_name;
        }
      }
    }
  }

  useEffect(() => {
    getBuilding();
    getFacultyList();
  }, [])

  const getFacultyList = async() => {
    const getFloor = await apiGetFaculty();
    if(getFloor.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy thông tin chuyên khoa!", 5000);
    } else if (getFloor.data) {
      const faculty:FacultyListType[] = getFloor.data;
      let tmpFloorOptions:SelectOptionType[] = [{
        label: "Không liên kết",
        value: "none"
      }];
      faculty.forEach(fac => {
        tmpFloorOptions.push({
          label: fac.fac_name,
          value: fac.fac_id
        })
      })
      setFacultyOptions(tmpFloorOptions);
    }
  }

  const getBuilding = async() => {
    const getBuilding = await apiAdminGetBuilding();
    if(getBuilding.error) {
      openToast("error", "Lỗi", "Đã xảy ra lỗi khi lấy danh sách tầng!", 5000);
    } else if (getBuilding.data) {
      let tmpBuilding:BuildingType[] = [];
      getBuilding.data.floors.forEach((floor:FloorType) => {
        if(getBuilding.data) {
          let tmpRoomList:RoomType[] = [];
          getBuilding.data.rooms.forEach((room:RoomType) => {
            if(room.floor_id === floor.floor_id) {
              tmpRoomList.push(room);
            }
          })
          tmpRoomList.sort((a, b) => a.room_order - b.room_order);
          tmpBuilding.push({
            ...floor,
            rooms: tmpRoomList
          })
        }
      })
      tmpBuilding.sort((a, b) => b.floor_order - a.floor_order);
      setBuildingList(tmpBuilding);
    }
  }

  const toggleEditMode = () => {
    setEditMode(!editMode);
  }
  
  const [activeId, setActiveId] = useState<string | null>(null);
  const [draggingType, setDraggingType] = useState<'floor' | 'room' | null>(null);

  const handleDragStart = (event: DragStartEvent) => {
    const { active } = event;
    setActiveId(active.id as string);

    // Determine if we're dragging a floor or a room
    if (buildingList.some((floor) => floor.floor_id === active.id)) {
      setDraggingType('floor');
    } else {
      setDraggingType('room');
    }
  };

  const handleDragEnd = (event: DragEndEvent) => {
    const { active, over } = event;

    if (!over) {
      setActiveId(null);
      setDraggingType(null);
      return;
    }

    if (draggingType === 'floor') {
      // Reorder buildingList
      const oldIndex = buildingList.findIndex((floor) => floor.floor_id === active.id);
      const newIndex = buildingList.findIndex((floor) => floor.floor_id === over.id);

      if (oldIndex !== newIndex) {
        const updatedFloors = arrayMove(buildingList, oldIndex, newIndex);
        setBuildingList(updatedFloors);
      }
    } else if (draggingType === 'room') {
      // Reorder or move rooms
      const activeRoomId = active.id as string;
      const overRoomId = over.id as string;

      let sourceFloorIndex: number | undefined;
      let destinationFloorIndex: number | undefined;

      // Find source and destination buildingList
      const sourceFloor = buildingList.find((floor, index) => {
        const roomIndex = floor.rooms.findIndex((room) => room.room_id === activeRoomId);
        if (roomIndex !== -1) {
          sourceFloorIndex = index;
          return true;
        }
        return false;
      });

      const destinationFloor = buildingList.find((floor, index) => {
        const roomIndex = floor.rooms.findIndex((room) => room.room_id === overRoomId);
        if (roomIndex !== -1) {
          destinationFloorIndex = index;
          return true;
        }
        return false;
      });

      if (
        sourceFloor &&
        destinationFloor &&
        sourceFloorIndex !== undefined &&
        destinationFloorIndex !== undefined
      ) {
        const sourceRoomIndex = sourceFloor.rooms.findIndex((room) => room.room_id === activeRoomId);
        const destinationRoomIndex = destinationFloor.rooms.findIndex((room) => room.room_id === overRoomId);

        // Move the room
        const [movedRoom] = sourceFloor.rooms.splice(sourceRoomIndex, 1);
        destinationFloor.rooms.splice(destinationRoomIndex, 0, movedRoom);

        // Update state
        setBuildingList([...buildingList]);
      }
    }

    setActiveId(null);
    setDraggingType(null);
  };

  return (
    <>
      <Helmet>
        <title>
          Quản lý khu nội trú - HKL
        </title>
      </Helmet>

      <div className="main-background">
        <div className="page-container">
          <div className="page-sidebar">
            <AdminSidebar selectedItem={"building"} />
          </div>
          <div className="page-content">
            <PageNavbar
              navbarTitle={`Quản lý khu nội trú`}
              hideSearch={true}
              searchRequest={(keyword) => {}}
              ref={navbarRef}
            />
            <div className="content">
              <div className={`hms-building ${editMode ? "edit-mode" : ""}`}>
                <div className="building-header">
                  <div className="header-title">{editMode ? "Giữ và kéo tầng hoặc phòng để sắp xếp lại" : "Sơ đồ phòng trong toà nhà"}</div>
                  <div className="header-button">
                    {/* <button className="btn btn-outline-primary btn-sm" onClick={() => toggleEditMode()}>
                      {editMode ? "Lưu thay đổi" : "Sắp xếp"}
                    </button> */}
                    <button className="btn btn-outline-primary btn-sm" onClick={() => toggleFloorModal("open")}>
                      Tạo tầng
                    </button>
                  </div>
                </div>
                <div className="building-content">
                  <DndContext
                    collisionDetection={draggingType === 'floor' ? rectIntersection : closestCenter}
                    onDragStart={handleDragStart}
                    onDragEnd={handleDragEnd}
                  >
                    <SortableContext
                      items={buildingList.map((floor) => floor.floor_id)}
                      strategy={verticalListSortingStrategy}
                    >
                      {buildingList.map((floor) => (
                        <DraggableFloor
                          key={floor.floor_id}
                          floor={floor}
                          roomIdBeingDragged={draggingType === 'room' ? activeId : undefined}
                          floorIdBeingDragged={draggingType === 'floor' ? activeId : undefined}
                          sendCreateRoomRequest={(requestFloor) => toggleRoomModal("open", requestFloor)}
                          sendUpdateRoomRequest={(floor, roomId, action) => {
                            if(action === "update") {
                              toggleRoomModal("open", floor, roomId)
                            } else {
                              toggleRoomDeleteAlert("open", floor.floor_id, roomId)
                            }
                          }}
                          facultyList={facultyOptions}
                          sendUpdateFloorRequest={(floorId, action) => {
                            if(action === "update") {
                              toggleFloorModal("open", floorId)
                            } else {
                              toggleFloorDeleteAlert("open", floorId)
                            }
                          }}
                        />
                      ))}
                    </SortableContext>
                    {/* <DragOverlay>
                      {draggingType === 'floor' && activeId ? (
                        <DraggableFloor floor={buildingList.find((floor) => floor.floor_id === activeId)!} sendCreateRoomRequest={() => {}} sendUpdateRoomRequest={() => {}} />
                      ) : draggingType === 'room' && activeId ? (
                        <DraggableRoom
                          sendUpdateRoomRequest={() => {}}
                          room={buildingList
                            .flatMap((floor) => floor.rooms)
                            .find((room) => room.room_id === activeId)!}
                        />
                      ) : null}
                    </DragOverlay> */}
                  </DndContext>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Form tạo/sửa tầng */}
      <CustomModal
        headerTitle={updateFloorId ? `Cập nhật tầng` : `Tạo tầng`}
        size="md"
        type="modal"
        ref={floorModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={floorInitialValue}
          validate={validateFloor}
          innerRef={floorFormRef}
          onSubmit={(values) => {
            submitFloor(values, updateFloorId ? "update" : "create")
          }}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="name"
                        name="name"
                        label="Tên tầng"
                        placeholder="Nhập tầng"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-12">
                      <CustomInput
                        formik={formikProps}
                        id="desc"
                        name="desc"
                        label="Mô tả"
                        placeholder="Nhập mô tả tầng"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="textarea"
                        textareaRow={3}
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleFloorModal("close")}>Thoát</button>
                    <button type="submit" className="btn btn-gradient">{updateFloorId ? "Cập nhật" : "Tạo"}</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Form tạo phòng */}
      <CustomModal
        headerTitle={`Tạo phòng ở ${updateRoomFloor?.floor_name}`}
        size="xl"
        type="modal"
        ref={roomCreateModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={roomCreateInitialValue}
          validate={() => {}}
          innerRef={roomCreateFormRef}
          onSubmit={submitCreateRoom}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div style={{marginBottom: "20px"}}>Khi tạo phòng, các phòng mới sẽ được xếp ở cuối danh sách với thứ tự từ trên xuống.</div>
                  <FieldArray name="rooms">
                    {({push, remove}) => (
                      <div>
                        {formikProps.values.rooms.map((_, index) => (
                          <div className="row" key={index} style={{marginBottom: "15px"}}>
                            <div className="title-with-btn">
                              <div className="title-text">Phòng số {index + 1}</div>
                              <div className="title-button">
                                {formikProps.values.rooms.length > 1 ? (
                                  <button
                                    type="button"
                                    className="btn btn-gradient"
                                    onClick={() => {
                                      remove(index)
                                    }}
                                  ><FontAwesomeIcon icon={faTrash} /></button>
                                ) : ""}
                              </div>
                            </div>
                            <div className="col-md-3">
                              <CustomInput
                                formik={formikProps}
                                id={`rooms[${index}]name`}
                                name={`rooms[${index}]name`}
                                label="Tên phòng"
                                placeholder="Nhập tên phòng"
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-4">
                              <CustomInput
                                formik={formikProps}
                                id={`rooms[${index}]fac_id`}
                                name={`rooms[${index}]fac_id`}
                                label="Chuyên khoa"
                                placeholder=""
                                initialValue=""
                                inputType="text"
                                isRequired={true}
                                selectOptions={facultyOptions}
                                type="select"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-2">
                              <CustomInput
                                formik={formikProps}
                                id={`rooms[${index}]size`}
                                name={`rooms[${index}]size`}
                                label="Sức chứa"
                                placeholder="Nhập sức chứa phòng"
                                initialValue=""
                                inputType="number"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                            <div className="col-md-3">
                              <CustomInput
                                formik={formikProps}
                                id={`rooms[${index}]price`}
                                name={`rooms[${index}]price`}
                                label="Đơn giá"
                                placeholder="Nhập đơn giá phòng"
                                initialValue=""
                                inputType="number"
                                isRequired={true}
                                type="input"
                                disabled={false}
                              />
                            </div>
                          </div>
                        ))}
                        <div className="col-md-12">
                          <button
                            type="button"
                            className="btn btn-gradient"
                            onClick={() => {
                              push({
                                name: "",
                                desc: "",
                                fac_id: "",
                                size: 1,
                                price: 0
                              })
                            }}
                          >Thêm phòng</button>
                        </div>
                      </div>
                    )}
                  </FieldArray>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleRoomModal("close")}>Thoát</button>
                    <button type="submit" className="btn btn-gradient">Tạo</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Form update room */}
      <CustomModal
        headerTitle={`Cập nhật phòng`}
        size="lg"
        type="modal"
        ref={roomUpdateModalRef}
      >
        <Formik
          validateOnChange={true}
          validateOnBlur={true}
          enableReinitialize={true}
          initialValues={roomUpdateInitialValue}
          validate={() => {}}
          innerRef={roomUpdateFormRef}
          onSubmit={submitUpdateRoom}
        >
          {(formikProps) => {
            return (
              <Form>
                <div className="body-content">
                  <div className="row">
                    <div className="col-md-3">
                      <CustomInput
                        formik={formikProps}
                        id={`name`}
                        name={`name`}
                        label="Tên phòng"
                        placeholder="Nhập tên phòng"
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-4">
                      <CustomInput
                        formik={formikProps}
                        id={`fac_id`}
                        name={`fac_id`}
                        label="Chuyên khoa"
                        placeholder=""
                        initialValue=""
                        inputType="text"
                        isRequired={true}
                        selectOptions={facultyOptions}
                        type="select"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-2">
                      <CustomInput
                        formik={formikProps}
                        id={`size`}
                        name={`size`}
                        label="Sức chứa"
                        placeholder="Nhập sức chứa phòng"
                        initialValue=""
                        inputType="number"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                    <div className="col-md-3">
                      <CustomInput
                        formik={formikProps}
                        id={`price`}
                        name={`price`}
                        label="Đơn giá"
                        placeholder="Nhập đơn giá phòng"
                        initialValue=""
                        inputType="number"
                        isRequired={true}
                        type="input"
                        disabled={false}
                      />
                    </div>
                  </div>
                </div>
                <div className="body-footer">
                  <div className="button-list">
                    <button type="button" className="btn btn-outline" onClick={() => toggleRoomModal("close")}>Thoát</button>
                    <button type="submit" className="btn btn-gradient">Cập nhật</button>
                  </div>
                </div>
              </Form>
            )
          }}
        </Formik>
      </CustomModal>

      {/* Alert xoá tầng */}
      <CustomModal
        headerTitle={"Xoá tầng"}
        size="md"
        type="alert"
        ref={floorDeleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá {getFloorInfo()}?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleFloorDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteFloor()}>Xoá</button>
          </div>
        </div>
      </CustomModal>

      {/* Alert xoá phòng */}
      <CustomModal
        headerTitle={"Xoá phòng"}
        size="md"
        type="alert"
        ref={roomDeleteAlertRef}
      >
        <div className="body-content">
          Bạn có chắc chắn muốn xoá {getRoomInfo()}?
        </div>
        <div className="body-footer">
          <div className="button-list">
            <button type="button" className="btn btn-outline" onClick={() => toggleRoomDeleteAlert("close")}>Không</button>
            <button type="button" className="btn btn-gradient" onClick={() => deleteRoom()}>Xoá</button>
          </div>
        </div>
      </CustomModal>
    </>
  )
}