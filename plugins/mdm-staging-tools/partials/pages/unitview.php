
<section id="mdmgc_units_view" class="mdmgc">
<!--     <div class="row flexwrap">
        <?php foreach( $units as $index => $unit ) : ?>
            <div class="column sm-6 md-4 lg-3">
                <div class="datacard" data-floorplan="">
                    <img src="<?php echo $unit->floorplanimage; ?>" alt="<?php echo sprintf( 'Floorplan %s', $unit->id ); ?>">
                    <ul class="carddetails">
                        <ul>Bedroom(s) <?php echo $unit->beds; ?></ul>
                        <ul>Bathroom(s) <?php echo $unit->baths; ?></ul>
                        <ul>Rent: <?php echo $unit->rent; ?></ul>
                        <ul>Move in By: <?php echo $unit->availablefuturefrom; ?></ul>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div> -->
    <script id="unit_card_template" type="text/x-handlebars-template">
        <div class="row flexwrap">
            {{#each this}}
                <div class="column sm-6 md-4 lg-3">
                    <figure class="datacard">
                        <div class="image">
                            <img src="{{images.[0]}}" alt="Floorplan {{id}}">
                            <a data-index="{{@index}}" href="#" rel="modal"><h4>View Details</h4></a>
                        </div>
                        <figcaption>
                            <ul class="carddetails">
                                <li>Address: {{street}}</li>
                                <li>Bedrooms: {{beds}}</li>
                                <li>Bathroom: {{baths}}</li>
                                <li>Square Footage: {{sqft}}</li>
                                <li>Rent: {{rent}}</li>
                                <li>Move in By: {{availablefuturefrom}}</li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            {{/each}}
        </div>
    </script>
    <script id="unit_table_template" type="text/x-handlebars-template">
        <table class="unitlisting datatable">
            <thead>
                <tr>
                    <th>Unit</th>
                    <th>Availability</th>
                    <th>Bedrooms</th>
                    <th>Baths</th>
                    <th>Rent</th>
                    <th>Floorplan</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                {{#each this}}
                <tr>
                    <td>{{id}}</td>
                    <td>{{availablefuturefrom}}</td>
                    <td>{{beds}}</td>
                    <td>{{baths}}</td>
                    <td>{{rent}}</td>
                    <td>{{floorplanmain}}</td>
                    <td>Contact</td>
                </tr>
                {{/each}}
            </tbody>
        </table>
    </script>
</section>

<section id="mdmgc_modal" class="mdmgc">
    <div class="modal">
        <div class="modal-header">
            <button class="close"><span class="fa fa-times" aria-hidden="true"></span></button>
        </div>
        <div id="mdmgc_modal_body" class="modal-body">
            <script type="text/x-handlebars-template">
                <div class="row" data-index="{{order}}">
                    <div class="col gcsm-6">
                        <img src="{{images.[0]}}" alt="{{id}}">
                    </div>
                    <div class="col gcsm-6">
                        <p>{{description}}</p>
                        <ul class="carddetails">
                            <li>Address: {{street}}</li>
                            <li>Bedroom: {{beds}}</li>
                            <li>Bathroom: {{baths}}</li>
                            <li>Square Footage: {{sqft}}</li>
                            <li>Rent: {{rent}}</li>
                            <li>Move in By: {{availablefuturefrom}}</li>
                        </ul>
                    </div>
                </div>
            </script>
        <div class="modal-footer">
            <button class="previous">Previous</button>
            <button class="next">Next</button>
        </div>
    </div>
</section>



