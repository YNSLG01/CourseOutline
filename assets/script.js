$(function () {
    var departmentObject = $('#department');
    var subjectsObject = $('#subjects');
    var coursecodeObject = $('#coursecode');

    // on change depertment
    departmentObject.on('change', function () {
        var departmentId = $(this).val();

        subjectsObject.html('<option value="">เลือกวิชา</option>');
        coursecodeObject.html('<option value="">เลือกรหัสวิชา</option>');

        $.get('get_subject.php?department_id=' + departmentId, function (data) {
            var result = JSON.parse(data);
            $.each(result, function (index, item) {
                subjectsObject.append(
                    $('<option></option>').val(item.department_id).html(item.s_name)
                );
            });
        });
    });

    // on change subjects
    subjectsObject.on('change', function () {
        var subjectsId = $(this).val();

        coursecodeObject.html('<option value="">เลือกรหัสวิชา</option>');

        $.get('get_coursecode.php?subject_id=' + subjectsId, function (data) {
            var result = JSON.parse(data);
            $.each(result, function (index, item) {
                coursecodeObject.append(
                    $('<option></option>').val(item.subject_id).html(item.code_id)
                );
            });
        });
    });
});