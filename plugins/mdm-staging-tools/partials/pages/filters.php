<div id="mdmgcfilters" class="mdmgc">
    <div class="grid flexwrap centered">
        <div class="filter col gcsm-2">
            <label for="beds">Beds</label>
            <span class="select"><select name="beds" id="beds" data-type="int" data-compare="=">
                <option selected value="">Any</option>
                <option value="0">Studio</option>
                <option value="1">1 Bedroom</option>
                <option value="2">2 Bedroom</option>
                <option value="3">3 Bedroom</option>
            </select></span>
        </div>
        <div class="filter col gcsm-2">
            <label for="baths">Baths</label>
            <span class="select"><select name="baths" id="baths" data-type="int" data-compare="=">
                <option selected value="">Any</option>
                <option value="1">1 Bath</option>
                <option value="2">2 Bath</option>
                <option value="3">3 Bath</option>
            </select></span>
        </div>
        <div class="filter col gcsm-2">
            <label for="sqft">SqFt.</label>
            <span class="select"><select name="sqft" id="sqft" data-type="doubleint" data-compare="<<">
                <option selected value="">Any</option>
                <option value="0:1000">0 to 1000</option>
                <option value="1000:1500">1000 to 1500</option>
                <option value="1500:2000">1500 to 2000</option>
                <option value="2000:10000">Above 2000</option>
            </select></span>
        </div>
        <div class="filter col gcsm-2">
            <label for="rent">Rent</label>
            <span class="select"><select name="rent" id="rent" data-type="doubleint" data-compare="<<">
                <option selected value="">Any</option>
                <option value="0:1000">Below $1,000</option>
                <option value="1000:1200">$1,000 - $1,200</option>
                <option value="1200:1500">$1,200 - $1,500</option>
                <option value="1500:2000">$1,500 - $2,000</option>
                <option value="2000:100000">Above $2,000</option>
            </select></span>
        </div>
        <div class="filter col gcsm-2 end">
            <span class="label">View</span>
            <ul id="toggle-view">
                <li class="linkview"><button data-viewtype="cardview" class="active" title="Card View"><span class="icon-dial-pad" aria-hidden="true"><span class="screen-reader-text"><?php __( 'View as Cards', $this->plugin_name ); ?></span></span></button></li>
                <li class="linkview"><button data-viewtype="tableview" title="Card View"><span class="icon-table" aria-hidden="true"><span class="screen-reader-text"><?php __( 'View as Table', $this->plugin_name ); ?></span></span></button></li>
            </ul>
        </div>
    </div>
</div>