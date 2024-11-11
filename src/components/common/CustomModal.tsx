import { forwardRef, ReactNode, Ref, useImperativeHandle, useState } from "react";
import '../../assets/css/modal.sass';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faXmark } from "@fortawesome/free-solid-svg-icons";

export type CustomModalHandles = {
  openModal: () => void,
  closeModal: () => void
}
export type CustomModalProps = {
  children: ReactNode;
  type: string;
  size: string;
  headerTitle: string;
  closeOnBackdrop?: boolean;
}

export const CustomModal = forwardRef(({children, headerTitle, type, size, closeOnBackdrop = true}: CustomModalProps, ref: Ref<CustomModalHandles>) => {
  const [modalOpen, setModalOpen] = useState<boolean>(false);
  const openModal = () => {
    setModalOpen(true);
  }
  const closeModal = () => {
    setModalOpen(false);
  }

  useImperativeHandle(ref, () => ({
    openModal, closeModal
  }));

  return (
    <>
      <div className={`modal-container ${modalOpen ? "open" : ""}`}>
        <div className="modal-backdrop" onClick={() => {
          if(closeOnBackdrop) {
            closeModal();
          }
        }}></div>
        <div className={`modal-content ${size} ${type ? "hms-" + type : ""}`}>
          <div className={`content`}>
            <div className="content-header">
              {headerTitle}
            </div>
            <div className="content-body">
              {children}
            </div>
          </div>
        </div>
      </div>
    </>
  )
})