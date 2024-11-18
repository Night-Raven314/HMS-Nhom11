import React from 'react';
import { SortableContext } from '@dnd-kit/sortable';
import { RoomType } from '../../../../pages/role-admin/Building';
import DraggableRoom from './DraggableRoom';

type Props = {
  rooms: RoomType[];
  floorId: string;
};

const RoomList: React.FC<Props> = ({ rooms }) => (
  <SortableContext items={rooms.map((room) => room.room_id)}>
    {rooms.map((room) => (
      <DraggableRoom key={room.room_id} room={room} />
    ))}
  </SortableContext>
);

export default RoomList;