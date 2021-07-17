//academic model
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id')
    var academic_year = button.data('academic_year')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #academic_year').val(academic_year)
    })

//program
    $('#new').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var id = button.data('id')
        var program_name = button.data('program_name')
        var program = button.data('program')

        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #program').val(program)
        modal.find('.modal-body #program_name').val(program_name)
        })

        //hostel
    $('#hostel').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var id = button.data('id')
        var hostel = button.data('hostel')

        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #hostel').val(hostel)
        })

//PAY
$('#pay').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)

    var id = button.data('id')
    var paymentmethod = button.data('paymentmethod')
    var acc_no = button.data('acc_no')

    var modal = $(this)

    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #paymentmethod').val(paymentmethod)
    modal.find('.modal-body #acc_no').val(acc_no)
    })

    //student view
    $('#dt').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var id = button.data('id')
        var name = button.data('name')
        var reg_no = button.data('reg_no')
        var program = button.data('program')
        var academic_year = button.data('academic_year')
        var hostel = button.data('hostel')
        var accomodation = button.data('accomodation')
        var contact = button.data('contact')
        var email = button.data('email')

        var modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #reg_no').val(reg_no)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #program').val(program)
        modal.find('.modal-body #academic_year').val(academic_year)
        modal.find('.modal-body #accomodation').val(accomodation)
        modal.find('.modal-body #hostel').val(hostel)
        modal.find('.modal-body #contact').val(contact)
        modal.find('.modal-body #email').val(email)
        })


        //view pdf
        $('#doc').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
    
            var id = button.data('id')
            var name = button.data('name')
            var reg_no = button.data('reg_no')
            var program = button.data('program')
            var academic_year = button.data('academic_year')
            var modal = $(this)
    
            modal.find('.modal-body #pdf').val(receipt)
            })
      