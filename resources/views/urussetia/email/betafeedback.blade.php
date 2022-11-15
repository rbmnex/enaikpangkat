@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
            <div class="card card-outline-info">
            <div class="card-block">
                <form action="{!! route('mail.sendfeedback') !!}" id="betafeedback">
                    <div class="form-body" style="font-weight:400">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group error" style="color: #8c001a;font-weight: 400">&nbsp;
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Feedback</label>
                                    <textarea rows="3" type="text" name="feedback" id="feedback" maxlength="100" class="form-control" value="" autocomplete="off"></textarea> 
                                </div>
                            </div>
                        </div>
                    </div>                        

                            
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Send Feedback</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>
    $("#betafeedback").submit(function(event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var feedback = $('#feedback').val();
        if(feedback === ''){
            $(".error").html('Please enter some feedback...');
            return false;
        }

        formdata = new FormData($(this)[0]);

        $.ajax({
            url: $(this).attr('action'),

            contentType: false,
            processData: false,
            data: formdata,
            type: 'POST',

            success: function(response)
             {

 
                    $(".error").css('color', 'green');
                    $(".error").html('Thanks For Your Feedback !');
                

            },

        });
        return false;
    });
</script>

@endsection