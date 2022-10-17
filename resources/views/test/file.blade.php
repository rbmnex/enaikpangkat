<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('asset/css/bootstrap-extended.css')}}">
    </head>
    <body>
        <div class="row">
            <div class="form-group col-6">
                <form id="upload_form" width="100%">
                <label class="form-label" for="">File Upload</label>
                <input class="form-control" type="file" id="file_1" name="file" />
                @csrf
                </form>
            </div>
            <div class="form-group col-6">
                <button type="button" id="upload_btn" class="btn btn-success">Upload</button>
            </div>
        </div>
        <div class="row" width="100%">
            <form id="ok" method="POST" action="/api/test/download" width="100%">
            @csrf
            <div class="form-group col-6">
                <label class="form-label" for="">Base 64</label>
                <textarea class="form-control" id="base64" name="base64"></textarea>
            </div>
            <div class="form-group col-6">
                <label class="form-label" for="">extension</label>
                <input class="form-control" type="text" id="ext" name="ext"/>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="download_btn" class="btn btn-success">Download</button>
            </div>
            </form>
        </div>
        <script src="{{asset('asset/vendors/js/vendors.min.js')}}"></script>
        <script>


            $('#upload_btn').click(function() {
                var form = $('#upload_form')[0];
                let data = new FormData(form);
                $.ajax({
                    type:'POST',
                    url: '/api/test/upload',
                    data:data,
                    processData: false,
                    contentType: false,
                    context: this,
                    success: function(resp) {
                        let d = resp.data;
                        $('#base64').val(d.base64);
                        $('#ext').val(d.ext);
                    }
                });
            });
            /*
            $('#download_btn').click(function() {
                var data = new FormData();
                data.append('base64', $('#base64').val());
                data.append('ext', $('#ext').val());
                data.append('_token',$('input[name="_token"]').val());
                //let base64 = $('#base64').val();
                //let ext = $('#ext').val();

                //window.open('/api/test/download?base64='+base64+'&ext='+ext, '_blank');

                $.ajax({
                        url: '/api/test/download',
                        data: data,
                        type:'POST',
                        cache: false,
                        xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 2) {
                                    if (xhr.status == 200) {
                                        xhr.responseType = "blob";
                                    } else {
                                        xhr.responseType = "text";
                                    }
                                }
                            };
                            return xhr;
                        },
                        success: function (data) {
                            //Convert the Byte Data to BLOB object.
                            var blob = new Blob([data], { type: "application/octetstream" });

                            //Check the Browser type and download the File.
                            var isIE = false || !!document.documentMode;
                            if (isIE) {
                                window.navigator.msSaveBlob(blob, fileName);
                            } else {
                                var url = window.URL || window.webkitURL;
                                link = url.createObjectURL(blob);
                                window.open(link, '_blank');
                            }
                        }
                    });
            });
            */
        </script>
    </body>
</html>
