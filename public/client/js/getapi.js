$.get(
    ' https://provinces.open-api.vn/api/?depth=2',
    function(res) {
        console.log(res);
        content = `<option>Chọn tỉnh thành phố</option>`;
        res.forEach(item => {

            content += `
                    <option value="${item.code}">${item.name}</option>
                    `;

        });

        $('.tinh').html(content);
    }
);

$('.tinh').change(function() {
    code = $('.tinh').val();
    $.get(
        `https://provinces.open-api.vn/api/p/${code}/?depth=2`,

        function(res) {
            content = ``;
            res.districts.forEach(item => {
                content += `
                 <option value="${item.code}">${item.name}</option>
                 `;

            });

            $('.huyen').html(content);
        }
    );

});

$('.huyen').change(function() {
    var code = $('.huyen').val();
    $.get(
        `https://provinces.open-api.vn/api/d/${code}?depth=2`,

        function(res) {
            content = '';
            res.wards.forEach(item => {
                content += `
                 <option value="${item.code}">${item.name}</option>
                 `;

            });

            $('.xa').html(content);
        }
    );
});

function show_add() {
    var x = document.getElementById("box_add");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        //  x.remove();
    }
}