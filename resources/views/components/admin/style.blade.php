<style>

    .admin-add {
        right: 1%;
        position: absolute;
    }

    .admin-add a {
        display: inline-block;
        font-size: 1.5rem;
        text-align: center;
        background-color: #7ace4c;
        color: #fff;
        text-decoration: none;
        padding: 1rem 2rem;
        transition: all 0.15s ease-in-out;
        cursor: pointer;

        background-repeat: no-repeat;
        background-position: center;
    }

    .admin-add a:hover {
        background-color: #60b532;
        color: #fff;
    }
</style>

<script>
    $(document).ready(function() {
        
        $('#add_department').click(function() {
            console.log('clicked')
        })
    })
</script>