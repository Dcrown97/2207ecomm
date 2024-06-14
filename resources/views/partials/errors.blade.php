@if(isset($errors) && count($errors) > 0)
<div class="alert alert-dismissable alert-danger fade show" id="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{--@dd($errors)--}}
    <?php
        if(!is_array($errors)){
            foreach ($errors->all() as $error){
                echo '<li><strong>'. $error . '</strong></li>';
            }
        }
        else {
            foreach ($errors as $error):
                echo '<li><strong>'. $error . '</strong></li>';
            endforeach;
        }
    ?>

</div>
<style>
    li{
        list-style: none;
    }
    .alert.alert-danger {
        background-color: #da9227;
        color: #ffffff;
    }
</style>
@endif