import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import "./assets/css/style.scss";
import "./assets/css/material_dash.css";
import { ToastProvider } from './components/common/CustomToast';
import { App } from './App';

createRoot(document.getElementById('root')!).render(
  <>
    <ToastProvider>
      <App />
    </ToastProvider>
  </>
)
