import React from 'react';
import { useSortable } from '@dnd-kit/sortable';
import { CSS } from '@dnd-kit/utilities';
import { RoomType } from '../../../../pages/role-admin/Building';
import { getRoomStatus } from '../../../../helpers/utils';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faXmark } from '@fortawesome/free-solid-svg-icons';
import { SelectOptionType } from '../../../common/CustomInput';

type Props = {
  room: RoomType;
  idBeingDragged?: string | null;
  facultyList: SelectOptionType[];
  sendUpdateRoomRequest: (roomId:string, action: string) => void
};

const DraggableRoom: React.FC<Props> = ({ room, idBeingDragged, sendUpdateRoomRequest, facultyList }) => {
  const { attributes, listeners, setNodeRef, transform, transition } = useSortable({
    id: room.room_id,
    disabled: true
  });

  const style: React.CSSProperties = {
    transform: CSS.Transform.toString(transform),
    transition,
    opacity: idBeingDragged && idBeingDragged === room.room_id ? 0 : 1
  };

  const getFacultyName = (facId:string) => {
    const findFaculty = facultyList.find(fac => fac.value === facId);
    if(findFaculty) {
      return findFaculty.label;
    } else {
      return "Không liên kết"
    }
  }

  return (
    <div className={`room-item ${room.status}`} ref={setNodeRef} {...attributes} {...listeners} style={style}>
      <button className='delete-btn' onClick={() => sendUpdateRoomRequest(room.room_id, "delete")}>
        <FontAwesomeIcon icon={faXmark} />
      </button>
      <div className='item-container' onClick={() => sendUpdateRoomRequest(room.room_id, "update")}>
        <div className='room-name'>{room.room_name}</div>
        <div className='room-info'><b>Khoa</b>: {getFacultyName(room.faculty_id)}</div>
        <div className='room-info'><b>Sức chứa</b>: {room.room_size} bệnh nhân</div>
        <div className='room-info'><b>Trạng thái</b>: {getRoomStatus(room.status)}</div>
      </div>
    </div>
  );
};

export default DraggableRoom;