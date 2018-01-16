<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#select_all').on('click',function(){
                if(this.checked){
                    $('.checkbox').each(function(){
                        this.checked = true;
                    });
                }else{
                     $('.checkbox').each(function(){
                        this.checked = false;
                    });
                }
            });

            $('.checkbox').on('click',function(){
                if($('.checkbox:checked').length == $('.checkbox').length){
                    $('#select_all').prop('checked',true);
                }else{
                    $('#select_all').prop('checked',false);
                }
            });
        });
    </script>
</head>
<body>

    <ul>
        <li><input type="checkbox" class="checkbox" value="1"/>Item 1</li>
        <li><input type="checkbox" class="checkbox" value="2"/>Item 2</li>
        <li><input type="checkbox" class="checkbox" value="3"/>Item 3</li>
        <li><input type="checkbox" class="checkbox" value="4"/>Item 4</li>
        <li><input type="checkbox" class="checkbox" value="5"/>Item 5</li>
    </ul>

</body>
</html>
