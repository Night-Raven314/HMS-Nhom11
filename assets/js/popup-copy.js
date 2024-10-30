// CAI NAY CUA KHOA 

// Function To Display Popup
function div_show(popupId) {
  // Ẩn tất cả popup
  document.getElementById("edit-popup").style.display = "none";
  document.getElementById("register-popup").style.display = "none";
  

  // Hiển thị popup được chỉ định
  document.getElementById(popupId).style.display = "block";
}

// Function to Hide Popup
function div_hide(popupId) {
  document.getElementById(popupId).style.display = "none";
}

