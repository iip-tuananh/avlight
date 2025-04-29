
// Lắng nghe sự kiện DOMContentLoaded khi trang đã tải xong
document.addEventListener('DOMContentLoaded', function() {
    // Lấy nút "Thêm vào giỏ" bằng class .detail-add-to-card
    const addCartButton = document.querySelector('.detail-add-to-card');
    if (addCartButton) {
    // Gắn sự kiện click cho nút "Thêm vào giỏ"
    addCartButton.addEventListener('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của nút

        // Lấy form chứa nút "Thêm vào giỏ"
        const form = this.closest('form');
        const formData = new FormData(form); // Tạo đối tượng FormData từ form

        // Gửi yêu cầu fetch đến server
        fetch(form.action, {
            method: 'POST', // Phương thức POST
            body: formData, // Dữ liệu từ form
            headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // Token CSRF
            }
        })
        .then(response => response.json()) // Chuyển đổi phản hồi thành JSON
        .then(data => {
            if (data.success) {
            // Hiển thị thông báo thành công bằng toastr
            toastr.success(data.message);

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            const cartCountElements = document.querySelectorAll('.count_item_pr');
            if (cartCountElements.length > 0) {
                cartCountElements.forEach(element => {
                element.textContent = data.cartCount; // Cập nhật số lượng từ server
                });
            }
            } else {
            // Hiển thị thông báo lỗi nếu có
            toastr.error(data.message);
            }
        })
        .catch(error => {
            console.error('Lỗi:', error); // Ghi lỗi vào console
            toastr.error('Đã xảy ra lỗi. Vui lòng thử lại.'); // Hiển thị thông báo lỗi
        });
    });
    } else {
    console.error('Phần tử .detail-add-to-card không tồn tại.'); // Ghi lỗi nếu không tìm thấy nút
    }
});
