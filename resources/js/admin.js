$(document).ready(function() {

    const dom = `
    <div style="text-align: left;" class="description">
        <h2>Description </h2>
        <label for="question[]">
            <input type="text" name="question[]" placeholder="Question in English">
        </label>
        <label for="answer[]">
            <textarea type="text" name="answer[]" placeholder="Answer in English"></textarea>
        </label>
        <label for="question_ar[]">
            <input type="text" name="question_ar[]" placeholder="Question in Arabic">
        </label>
        <label for="answer_ar[]">
            <textarea type="text" name="answer_ar[]" placeholder="Answer in Arabic"></textarea>
        </label>
        <div class="admin-add remove-desc">
            <a>-</a>
        </div>
        <div class="admin-add add-desc" style="right: 10%;">
            <a>+</a>
        </div>
    </div>

    `;
        

    $('#description_slot').on('click','.add-desc', function(e) {
        var parent = $(e.target).parent();

        parent.after(dom);
    })

    $('#description_slot').on('click','.remove-desc', function(e) {
        var target = $(e.target).parent().parent();

        console.log(target)

        target.remove();
    })

    $('#addaccr').click(function(e) {

        var text = $('#chosen_accr option:selected').text();
        var value = $('#chosen_accr').val()

        var target = $(e.target).parent().parent().parent().children()[0];
        $(target).append(`
            <div style="display: flex;">
                <input type="hidden" value="${value}" name="accreditations[]" readonly>
                <input type="text" value="${text}" readonly>
                <div class="admin-add remove-tag" style="position: inherit;">
                    <a>-</a>
                </div>
            </div>
        `);

    })

    $('#chosen_accr').parent().parent().on('click','.remove-tag', function(e){
        $(e.target).parent().parent().remove();
    })

    $('#adddept').click(function(e) {

        var text = $('#chosen_dept option:selected').text();
        var value = $('#chosen_dept').val()

        console.log($(e.target).parent().parent().parent().children()[0]);

        var target = $(e.target).parent().parent().parent().children()[0];
        $(target).append(`
            <div style="display: flex;">
                <input type="hidden" value="${value}" name="departments[]" readonly>
                <input type="text" value="${text}" readonly>
                <div class="admin-add remove-tag" style="position: inherit;">
                    <a>-</a>
                </div>
            </div>
        `);

    })

    $('#chosen_dept').parent().parent().on('click','.remove-tag', function(e){
        $(e.target).parent().parent().remove();
    })


    $('#infras').on('click','.addinfra', function(e){
        var en = $(e.target).parent().parent().children().eq(0).children().eq(0).val()
        var ar = $(e.target).parent().parent().children().eq(1).children().eq(0).val()

        $(e.target).parent().parent().before(`
            <div style="display:flex;">
                <label for="en_infrastructure[]" style="flex: 0 0 40%;">
                    <textarea name="en_infrastructure[]" type="text" placeholder="Hospital Infrastructure (EN)">${en}</textarea>
                </label>
                <label for="ar_infrastructure[]" style="flex: 0 0 40%;">
                    <textarea name="ar_infrastructure[]" type="text" placeholder="Hospital Infrastructure (AR)">${ar}</textarea>
                </label>
                <div style="position: inherit;" class="admin-add addinfra">
                    <a>+</a>
                </div>
                <div style="position: inherit;" class="admin-add remove-infra">
                    <a>-</a>
                </div>
            </div>
        `);
    })

    $('#infras').on('click','.remove-infra', function(e){
        $(e.target).parent().parent().remove()
    })

    $('#abouts').on('click','.add-about', function(e){
        var en = $(e.target).parent().parent().children().eq(0).children().eq(0).val()
        var ar = $(e.target).parent().parent().children().eq(1).children().eq(0).val()
        $(e.target).parent().parent().after(`
            <div style="display:flex;">
                <label for="en_about[]" style="flex: 0 0 40%;">
                    <textarea name="en_about[]" type="text" placeholder="Hospital About (EN)">${en}</textarea>
                </label>
                <label for="ar_about[]" style="flex: 0 0 40%;">
                    <textarea name="ar_about[]" type="text" placeholder="Hospital About (AR)">${ar}</textarea>
                </label>
                <div style="position: inherit;" class="admin-add add-about">
                    <a>+</a>
                </div>
                <div style="position: inherit;" class="admin-add remove-about">
                    <a>-</a>
                </div>
            </div>
        `);
    })

    $('#abouts').on('click','.remove-about', function(e){
        $(e.target).parent().parent().remove()
    })

    $('#specialities').on('click','.add-speciality', function(e){
        var en = $(e.target).parent().parent().children().eq(0).children().eq(0).val()
        var ar = $(e.target).parent().parent().children().eq(1).children().eq(0).val()
        $(e.target).parent().parent().after(`
            <div style="display:flex;">
                <label for="en_speciality[]" style="flex: 0 0 40%;">
                    <textarea name="en_speciality[]" type="text" placeholder="Hospital Speciality (EN)">${en}</textarea>
                </label>
                <label for="ar_speciality[]" style="flex: 0 0 40%;">
                    <textarea name="ar_speciality[]" type="text" placeholder="Hospital Speciality (AR)">${ar}</textarea>
                </label>
                <div style="position: inherit;" class="admin-add add-speciality">
                    <a>+</a>
                </div>
                <div style="position: inherit;" class="admin-add remove-speciality">
                    <a>-</a>
                </div>
            </div>
        `);
    })

    $('#specialities').on('click','.remove-speciality', function(e){
        $(e.target).parent().parent().remove()
    })

})