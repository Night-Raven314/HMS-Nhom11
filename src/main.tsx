import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import "./assets/css/material_dash.css";
import "./assets/css/style.scss";
import { ToastProvider } from './components/common/CustomToast';
import { App } from './App';

createRoot(document.getElementById('root')!).render(
  <>
    <ToastProvider>
      <App />
    </ToastProvider>
  </>
)
