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
// function exportChart() {
//     let date_start = $('#date_start').val();
//     let date_finish = $('#date_finish').val();
//     $.ajax({
//         url: 'admin/chart/export_chart',
//         type: "POST",
//         data: {
//             date_start: date_start,
//             date_finish: date_finish,
//             _token: '{{csrf_token()}}',
//         },
//         success: function (data) {

//         }
//     })
// }

$('#btn-export-quantity-data').click(
    function (ev) {
        let date_start = document.getElementById('date_start').value;
        let date_finish = document.getElementById('date_finish').value;
        let boolen_date;
        if (date_start < date_finish) {
            boolen_date = true;
        }
        else {
            boolen_date = false;
        }
        $.ajax({
            url: '/admin/chart/quantity',
            type: "POST",
            data: {
                date_start: date_start,
                date_finish: date_finish,
                boolen_date: boolen_date,
            },
            success: function (data) {

                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.data_res_label,
                        datasets: [{
                            label: 'Số lượng bán',
                            data: data.data_res_data,
                            borderWidth: 6,

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })
    }
)
$('#btn-export-price-data').click(
    function (ev) {
        let date_start = document.getElementById('date_start').value;
        let date_finish = document.getElementById('date_finish').value;
        var boolen_date=true;
        $.ajax({
            url: '/admin/chart/price',
            type: "POST",
            data: {
                date_start: date_start,
                date_finish: date_finish,
                boolen_date: boolen_date,
            },
            success: function (data) {
                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.data_res_label,
                        datasets: [{
                            label: 'Doanh thu',
                            data: data.data_res_data,
                            borderWidth: 6,

                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })

    }
)






