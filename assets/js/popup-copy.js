// Function To Display Popup
function div_show(popupId) {
  // Mảng chứa các ID của popup mà bạn có thể cần ẩn
  const popupIds = ["edit-popup", "register-popup", "container-popup"];

  // Duyệt qua tất cả các ID để ẩn popup tương ứng nếu tồn tại trên trang
  popupIds.forEach((id) => {
    const popup = document.getElementById(id);
    if (popup) {
      popup.style.display = "none"; // Ẩn popup nếu tìm thấy
    }
  });

  // Hiển thị popup được chỉ định nếu tồn tại trên trang
  const targetPopup = document.getElementById(popupId);
  if (targetPopup) {
    targetPopup.style.display = "block";
  } else {
    console.warn(`Popup with ID '${popupId}' not found on this page.`);
  }
}

// Function to Hide Popup
function div_hide(popupId) {
  const popup = document.getElementById(popupId);
  if (popup) {
    popup.style.display = "none";
  } else {
    console.warn(`Popup with ID '${popupId}' not found on this page.`);
  }
}
