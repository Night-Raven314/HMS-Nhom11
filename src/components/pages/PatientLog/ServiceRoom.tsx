import { FC, Fragment, useEffect, useState } from "react";
import { BuildingType, FloorType, RoomType } from "../../../pages/role-admin/Building";
import { useToast } from "../../common/CustomToast";
import { apiAdminGetBuilding, apiGetFaculty } from "../../../helpers/axios";
import DraggableFloor from "../role-admin/Building/DraggableFloor";
import { SelectOptionType } from "../../common/CustomInput";
import { FacultyListType } from "../../../pages/role-admin/Faculty";
import { PatientLogType } from "../../../pages/PatientInfo";

export type RoomModalProps = {
  saveRoom: (floor:FloorType, room: RoomType) => void;
  initialSelectedRoom?: RoomType,
  closeModal: () => void,
  buildingList: BuildingType[],
  patientLog: PatientLogType
}

export const ServiceRoomModal:FC<RoomModalProps> = ({
  saveRoom, initialSelectedRoom, closeModal, buildingList, patientLog
}) => {
  const {openToast} = useToast();
  const [facultyOptions, setFacultyOptions] = useState<SelectOptionType[]>([]);
  const [selectedRoom, setSelectedRoom] = useState<RoomType | null>(null);

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

  const selectRoom = (floor:FloorType, roomId:string) => {
    const getFloor = buildingList.find(bFloor => bFloor.floor_id === floor.floor_id);
    if(getFloor) {
      const getRoom = getFloor.rooms.find(bRoom => bRoom.room_id === roomId);
      if(getRoom) {
        setSelectedRoom(getRoom);
      }
    }
  }
  const requestSaveRoom = (room:RoomType) => {
    const getFloor = buildingList.find(bFloor => bFloor.floor_id === room.floor_id);
    if(getFloor) {
      saveRoom(getFloor, room);
    }
  }

  useEffect(() => {
    getFacultyList();
  }, [])

  const setInitialRoom = () => {
    if(initialSelectedRoom) {
      setSelectedRoom(initialSelectedRoom)
    } else {
      setSelectedRoom(null)
    }
  }

  useEffect(() => {
    setInitialRoom();
  }, [initialSelectedRoom])

  return (
    <>
      <div className="body-content">
        <div className="building-content room-modal">
          {buildingList.map((floor) => (
            <DraggableFloor
              key={floor.floor_id}
              floor={floor}
              roomIdBeingDragged={undefined}
              floorIdBeingDragged={undefined}
              sendCreateRoomRequest={() => {}}
              sendUpdateRoomRequest={(requestFloor, requestRoomId, action) => {selectRoom(requestFloor, requestRoomId)}}
              facultyList={facultyOptions}
              sendUpdateFloorRequest={() => {}}
              modalSelect={true}
              selectedRoomId={selectedRoom ? selectedRoom.room_id : undefined}
              facultyId={patientLog.faculty_id}
            />
          ))}
        </div>
      </div>
      <div className="body-footer">
        <div className="button-list">
          <button type="button" className="btn btn-outline" onClick={() => {
            closeModal();
            setTimeout(() => {
              setInitialRoom();
            }, 400);
          }}>Thoát</button>
          <button type="submit" className="btn btn-gradient" onClick={() => {
            if(selectedRoom) {
              requestSaveRoom(selectedRoom)
            }
          }}>Chọn phòng</button>
        </div>
      </div>
    </>
  )
}