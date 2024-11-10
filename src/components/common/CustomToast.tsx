import { createContext, FC, memo, ReactNode, useContext, useEffect, useRef, useState } from "react";
import '../../assets/css/toast.sass';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCircleCheck } from "@fortawesome/free-solid-svg-icons";
import { faCircleExclamation } from "@fortawesome/free-solid-svg-icons/faCircleExclamation";
import { faXmark } from "@fortawesome/free-solid-svg-icons/faXmark";

type ToastType = {
  id: number,
  title: string,
  desc: string,
  type: string,
  duration: number
}

type ToastItemType = {
  toast: ToastType,
  removeToast: (id:number) => void
}

type ToastContextType = {
  openToast: (type:string, title:string, message:string, duration?: number) => void;
};
type ToastProviderProps = {
  children: ReactNode;
};

const ToastContext = createContext<ToastContextType | undefined>(undefined);

export const useToast = () => {
  const context = useContext(ToastContext);
  if (!context) {
    throw new Error('useToast must be used within a ToastProvider');
  }
  return context;
};

const ToastItem:FC<ToastItemType> = memo(({toast, removeToast}) => {
  const toastItemRef = useRef<any>(null);
  const [showToast, setShowToast] = useState<boolean>(false);
  const [toastHeight, setToastHeight] = useState<number>(0);
  useEffect(() => {
    const getToastEl = toastItemRef.current.getBoundingClientRect();
    setToastHeight(getToastEl.height);
    setShowToast(true);
    setTimeout(() => {
      closeToast();
    }, toast.duration);
  }, [])
  const closeToast = () => {
    setShowToast(false);
    setToastHeight(0);
    setTimeout(() => {
      removeToast(toast.id)
    }, 500);
  }
  const iconFontSize = "2em";
  return (
    <div
      className={`custom-toast-item-container ${showToast ? "show" : ""}`}
      style={{height: `${toastHeight}px`}}
    >
      <div className={`custom-toast-item`} ref={toastItemRef}>
        <div className={`custom-toast-content ${toast.type}`}>
          <div className="item-icon">
            {toast.type === "success" ? (
              <FontAwesomeIcon fontSize={iconFontSize} icon={faCircleCheck} />
            ) : ""}
            {toast.type === "error" ? (
              <FontAwesomeIcon fontSize={iconFontSize} icon={faCircleExclamation} />
            ) : ""}
          </div>
          <div className="item-message">
            <div className="item-title">
              <div className="title-text">{toast.title}</div>
              <div className="close-btn">
                <button onClick={() => closeToast()}>
                  <FontAwesomeIcon icon={faXmark} />
                </button>
              </div>
            </div>
            <div className="item-desc">{toast.desc}</div>
          </div>
        </div>
      </div>
    </div>
  )
})

export const ToastProvider:FC<ToastProviderProps> = ({ children }) => {
  const [toastList, setToastList] = useState<ToastType[]>([]);
  const openToast = (type:string, title:string, message:string, duration?: number) => {
    let newId = 1;
    if(toastList.length) {
      newId = toastList[0].id + 1;
    }
    let newToast:ToastType = {
      id: newId,
      title: title,
      desc: message,
      type: type,
      duration: duration || 5000
    }
    setToastList((prev) => [newToast, ...prev])
  }
  const removeToast = (id:number) => {
    setToastList(prev => prev.filter(item => item.id !== id));
  }
  return (
    <ToastContext.Provider value={{openToast}}>
      {children}
      <div className="custom-toast-container">
        {toastList.map(toastItem => {
          return (
            <ToastItem
              key={toastItem.id}
              toast={toastItem}
              removeToast={(id:number) => {removeToast(id)}}
            />
          )
        })}
      </div>
    </ToastContext.Provider>
  )
}