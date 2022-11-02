$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id, url) {
    if (confirm('bạn có chắc chắn xóa?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert('Xóa lỗi, vui lòng thử lại');
                }
            }

        })
    }
}

$(document).ready(() => {
    $('#photo').change(function () {
        const file = this.files[0];
        console.log(file);
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                console.log(event.target.result);
                $('#imgPreview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
});