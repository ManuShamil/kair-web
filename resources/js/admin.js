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

})