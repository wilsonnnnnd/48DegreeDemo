<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Property $property
 */
?>
<div class="row">
    <?= $this->Form->create($property) ?>
    <div class="card text-center">
        <div class="card-header">
            Edit Property
        </div>
        <div class="card-body" style="width: 100%">
            <div class="row">
                <div class="col-6">
                    <?php
                    echo $this->Form->control('street',['class'=>'form-control','minlength'=>'5','placeholder' => 'Enter an Address','id' => 'current_address','maxlength'=>50]);
                    echo $this->Form->control('city',['class'=>'form-control','id'=>'new_address','placeholder' => 'Enter a City','maxlength'=>50]);
                    echo $this->Form->control('state',['class'=>'form-control', 'id' => 'new_state','placeholder' => 'Enter a State','maxlength'=>50]);
                    echo $this->Form->control('postcode',['class'=>'form-control','type'=>'number','length'=>'4', 'id'=>'new_postcode','placeholder' => 'Enter a Postcode','maxlength'=>10]);
                    ?>
                </div>
                <div class="col-6">
                    <?php
                    echo $this->Form->control('warranty_start',['class'=>'form-control']);
                    echo $this->Form->control('warranty_end',['class'=>'form-control']);
                    echo $this->Form->control('description',['class'=>'form-control','Maxlength'=>3000,'placeholder'=>"The max word is 3000. If you have more want to talk, please Email us. Our Email: info@48.com."]);
                    ?>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <?= $this->Form->button('Submit',['class'=>'btn btn-outline-primary']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Form->button ('Cancel', ['onclick' =>'history.back ()', 'type' =>'button','class'=>'btn btn-outline-secondary'])?>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->full_addr), 'class' => 'btn btn-outline-danger', 'type' =>'button']
            ) ?>
        </div>


    </div>
</div>
<br>




<!--//set the submit only can submit once-->
<script type="text/javascript">
    $('form').submit(function() {
        $(this).find("button[type='Submit']").prop('disabled',true);
        $(this).find("button[type='Delete']").prop('disabled',true);
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
