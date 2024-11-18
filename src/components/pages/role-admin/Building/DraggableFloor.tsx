import React from 'react';
import { rectSortingStrategy, SortableContext, useSortable, verticalListSortingStrategy } from '@dnd-kit/sortable';
import { CSS } from '@dnd-kit/utilities';
import { BuildingType, FloorType } from '../../../../pages/role-admin/Building';
import DraggableRoom from './DraggableRoom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAdd, faBars, faPenToSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import { SelectOptionType } from '../../../common/CustomInput';
import { getFloorStatus } from '../../../../helpers/utils';

type Props = {
  floor: BuildingType;
  sendCreateRoomRequest: (floor: FloorType) => void;
  sendUpdateRoomRequest: (floor: FloorType, roomId: string, action: string) => void;
  sendUpdateFloorRequest: (floorId: string, action: string) => void;
  roomIdBeingDragged? :string | null;
  floorIdBeingDragged? :string | null;
  facultyList: SelectOptionType[];
};

const DraggableFloor: React.FC<Props> = ({ floor, roomIdBeingDragged, floorIdBeingDragged, sendCreateRoomRequest, sendUpdateRoomRequest, facultyList, sendUpdateFloorRequest }) => {
  const { attributes, listeners, setNodeRef, transform, transition } = useSortable({
    id: floor.floor_id,
    disabled: true
  });

  const style: React.CSSProperties = {
    transform: CSS.Transform.toString(transform),
    transition,
    opacity: floorIdBeingDragged && floorIdBeingDragged === floor.floor_id ? 0 : 1
  };

  return (
    <div ref={setNodeRef} style={style} {...attributes} {...listeners} className="floor-container">
      <div className='floor-title-container'>
        {/* <div className='floor-grabber'>
          <FontAwesomeIcon icon={faBars} />
        </div> */}
        <div className='floor-info'>
          <div className='floor-name'>{floor.floor_name}</div>
          <div className='floor-note'>{floor.floor_note}</div>
        </div>
        <div className='floor-icon'>
          <button className='btn btn-gradient' onClick={() => sendUpdateFloorRequest(floor.floor_id, "update")}><FontAwesomeIcon icon={faPenToSquare} /></button>
        </div>
        <div className='floor-icon'>
          <button className='btn btn-gradient' onClick={() => sendUpdateFloorRequest(floor.floor_id, "delete")}><FontAwesomeIcon icon={faTrash} /></button>
        </div>
      </div>
      <div className="floor-rooms-container">
        <SortableContext
          items={floor.rooms.map((room) => room.room_id)}
          strategy={rectSortingStrategy}
        >
          {floor.rooms.map((room) => (
            <DraggableRoom key={room.room_id} room={room} idBeingDragged={roomIdBeingDragged} sendUpdateRoomRequest={(roomId, action) => sendUpdateRoomRequest(floor, roomId, action)} facultyList={facultyList} />
          ))}
        </SortableContext>
        <div className={`room-item add-room`}>
          <div className='item-add-container' onClick={() => sendCreateRoomRequest(floor)}>
            <div className='add-icon'>
              <FontAwesomeIcon icon={faAdd} />
            </div>
            <div className='add-text'>Tạo phòng</div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default DraggableFloor;