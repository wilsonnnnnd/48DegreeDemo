<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    .error{font-size: 25px !important;color: red;}
    .form-control .form-error{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box;border:1px solid #d1d3e2;border-radius:.35rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
    .form-control,.form-error{display:block;width:100%;height:calc(1.5em + .75rem + 2px);padding:.375rem .75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box;border:1px solid #d1d3e2;border-radius:.35rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}
</style>
<div class="row">
    <?= $this->Form->create($user,['style'=>'width:55%'])?>
    <div  class="card text-center">
        <div class="card-header">
            <legend><?= __('Add Subcontractor') ?></legend>
        </div>
        <div class="card-body">
            <?php

            $options = array('Subcontractor'=>'Subcontractor');
            echo $this->Form->control('role', ['class'=>'form-control','options'=>$options]);
            echo $this->Form->control('email',['class'=>'form-control']);
            echo $this->Form->control('password',['class'=>'form-control']);
            echo $this->Form->control('confirm_password',['type'=>'password','class'=>'form-control']);
            ?>
            <br>
            <h4>User Info</h4>
        </div>
        <div class="row">
            <div class="col-6">
                <?php
                $speciality = array(
                    'Plumbing, Heating, and Air-Conditioning' => 'Plumbing, Heating, and Air-Conditioning', 'Painting and Paper Hanging' => 'Painting and Paper Hanging', 'Electrical Work' => 'Electrical Work', 'Masonry, Stonework, Tile Setting, and Plastering' => 'Masonry, Stonework, Tile Setting, and Plastering', 'Carpentry and Floor Work' => 'Carpentry and Floor Work', 'Roofing, Siding, and Sheet Metal Work' => 'Roofing, Siding, and Sheet Metal Work', 'Concrete Work' => 'Concrete Work', 'Special Trade Contractors' => 'Special Trade Contractors'
                );
                echo $this->Form->control('subcontractor.first_name', ['class' => 'form-control', 'type' => 'word','placeholder'=>'First Name Here','Maxlength'=>20]);
                echo $this->Form->control('subcontractor.last_name', ['class' => 'form-control', 'type' => 'word','placeholder'=>'Last Name Here','Maxlength'=>20]);
                echo $this->Form->control('subcontractor.speciality', ['class' => 'form-control', 'options' => $speciality]);
                echo $this->Form->control('subcontractor.business', ['class' => 'form-control', 'type' => 'word','placeholder'=>'Business Name Here','Maxlength'=>20]);
                echo $this->Form->control('subcontractor.phone_no', ['class' => 'form-control', 'type' => 'number',  'maxlength' => 10,'placeholder'=>'Phone Number Here']);
                ?>
            </div>
            <div class="col-6">
                <?php
                echo $this->Form->control('subcontractor.street',['class'=>'form-control','id'=>'current_address','placeholder'=>'Enter an Address','Maxlength'=>50]);
                echo $this->Form->control('subcontractor.city',['class'=>'form-control','id' => 'new_address','placeholder'=>'Enter a City','Maxlength'=>50]);
                echo $this->Form->control('subcontractor.state',['class'=>'form-control','id' => 'new_state','placeholder'=>'Enter a State','Maxlength'=>50]);
                echo $this->Form->control('subcontractor.postcode',['class'=>'form-control','id'=>'new_postcode','placeholder'=>'Enter a Postcode','Maxlength'=>10]);

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                echo $this->Form->control('subcontractor.notes',['class'=>'form-control','Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please email us. Our Email: info@48.com."]);
                ?>
            </div>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
        </div>
    </div>
</div>


<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
    });
</script>



<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let autocomplete;
    // let autocomplete1;

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('current_address'), {
            componentRestrictions: { country: ["au"] },
        });
        autocomplete.addListener("place_changed", fillInAddress);
        // autocomplete1 = new google.maps.places.Autocomplete(document.getElementById('new_address'));
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();
        let address1 = "";
        let postcode = "";
        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        // place.address_components are google.maps.GeocoderAddressComponent objects
        // which are documented at http://goo.gle/3l5i5Mr
        for (const component of place.address_components) {
            const componentType = component.types[0];

            switch (componentType) {
                case "street_number": {
                    address1 = `${component.long_name} ${address1}`;
                    break;
                }

                case "route": {
                    address1 += component.short_name;
                    break;
                }

                case "postal_code": {
                    $("#new_postcode").val(`${component.long_name}${postcode}`);
                    break;
                }
                case "locality":
                    $("#new_address").val(component.long_name);
                    // document.querySelector("#locality").value =
                    break;

                case "administrative_area_level_1": {
                    $("#new_state").val(component.short_name);
                    break;
                }

            }
        }
        console.log(address1);
        $("#current_address").val(address1);
        // $("#street").val(postcode);

        // After filling the form with address components from the Autocomplete
        // prediction, set cursor focus on the second address line to encourage
        // entry of subpremise information such as apartment, unit, or floor number.
        // address2Field.focus();
    }
</script>

<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJMs9Hm7j3cEhbOewPl8lxFawWTEkvy7w&libraries=places&callback=initAutocomplete">
</script>



