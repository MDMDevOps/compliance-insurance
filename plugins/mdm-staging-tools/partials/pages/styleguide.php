<h2>Typeography</h2>



<section id="headings" class="styleguide">

<h3>Headings</h3>
<hr>
All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h6&gt;</code>, are available. <code>.h1</code> through <code>.h6</code> classes are also available, for when you want to match the font styling of a heading but still want your text to be displayed inline.

    <div class="display">
        <h1>H1 Heading Level One</h1>
        <hr>
        <h2>H2 Heading Level Two</h2>
        <hr>
        <h3>H3 Heading Level Three</h3>
        <hr>
        <h4>H4 Heading Level Four</h4>
        <hr>
        <h5>H5 Heading Level Five</h5>
        <hr>
        <h6>H6 Heading Level Six</h6>

<pre class="language-html"><code class="language-html"><?php echo trim( htmlspecialchars( '
<h1>H1 Heading Level One</h1>
<h2>H2 Heading Level Two</h2>
<h3>H3 Heading Level Three</h3>
<h4>H4 Heading Level Four</h4>
<h5>H5 Heading Level Five</h5>
<h6>H6 Heading Level Six</h6>'
) ); ?>
</code></pre>
</div>

    Create lighter, secondary text in any heading with a generic <code>&lt;small&gt;</code> tag or the <code>.small</code> class.

    <div class="display">
        <h1>H1 Heading Level One <small>Secondary text</small></h1>
        <hr>
        <h2>H2 Heading Level Two <small>Secondary text</small></h2>
        <hr>
        <h3>H3 Heading Level Three <small>Secondary text</small></h3>
        <hr>
        <h4>H4 Heading Level Four <small>Secondary text</small></h4>
        <hr>
        <h5>H5 Heading Level Five <small>Secondary text</small></h5>
        <hr>
        <h6>H6 Heading Level Six <small>Secondary text</small></h6>
<pre class="language-html"><code class="language-html"><?php echo trim( htmlspecialchars( '
<h1>H1 Heading Level One <small>Secondary text</small></h1>
<h2>H2 Heading Level Two <small>Secondary text</small></h2>
<h3>H3 Heading Level Three <small>Secondary text</small></h3>
<h4>H4 Heading Level Four <small>Secondary text</small></h4>
<h5>H5 Heading Level Five <small>Secondary text</small></h5>
<h6>H6 Heading Level Six <small>Secondary text</small></h6>'
) ); ?>
</code></pre>
</div>

</section>
<section id="bodycopy" class="styleguide">

    <h3>Body Copy</h3>

    <hr>

    <p>MPress's global default <code>font-size</code> is <strong>16px</strong>, with a <code>line-height</code> of <strong>1.618</strong>. This is applied to the <code>&lt;body&gt;</code> and all paragraphs. In addition, <code>&lt;p&gt;</code> (paragraphs) receive a bottom margin of <strong>1.618em</strong></p>

    <div class="display">


    <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>

    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>

    <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>

<pre class="language-html"><code class="language-html"><?php echo trim( htmlspecialchars( '
<p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>
<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>'
) ); ?>
</code></pre>
    </div>

</section>
<section id="blockquotes" class="styleguide">
    <h3>Blockquotes</h3>
    <hr>
    <div class="display">
        <blockquote>
            <p>Stay hungry. Stay foolish.</p>
        </blockquote>

        <blockquote>
            <p>People think focus means saying yes to the thing you've got to focus on. But that's not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I'm actually as proud of the things we haven't done as the things I have done. Innovation is saying no to 1,000 things.</p>
            <footer><cite>Steve Jobs</cite> - Apple Worldwide Developers' Conference, 1997</footer>
        </blockquote>
        <code class="gistdisplay" data-gist-id="45771c8d51ff63db5de469ce061600cf" data-gist-file="blockquotes.html"></code>
    </div>

    <p>Add <code>.reverse</code> for a blockquote with right-aligned content.</p>

    <div class="display">
        <blockquote class="reverse">
            <p>Stay hungry. Stay foolish.</p>
        </blockquote>

        <blockquote class="reverse">
            <p>People think focus means saying yes to the thing you've got to focus on. But that's not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I'm actually as proud of the things we haven't done as the things I have done. Innovation is saying no to 1,000 things.</p>
            <footer><cite>Steve Jobs</cite> - Apple Worldwide Developers' Conference, 1997</footer>
        </blockquote>
        <code class="gistdisplay" data-gist-id="45771c8d51ff63db5de469ce061600cf" data-gist-file="blockquotesreverse.html"></code>
    </div>
</section>
<section id="images" class="styleguide">
<h2>Image Alignment</h2>
<hr>
    <div class="display">
        <div class="wrapper clearfix">
            [caption id="attachment_904" align="alignleft" width="150"]<img class="wp-image-904 size-full" src="http://local.wordpress.dev/wp-content/uploads/2013/03/image-alignment-150x150.jpg" alt="Image Alignment 150x150" width="150" height="150" /> <code>.alignleft</code>[/caption]
        </div>
        <div class="wrapper clearfix">
            [caption id="attachment_904" align="aligncenter" width="150"]<img class="wp-image-904 size-full" src="http://local.wordpress.dev/wp-content/uploads/2013/03/image-alignment-150x150.jpg" alt="Image Alignment 150x150" width="150" height="150" /> <code>.aligncenter</code>[/caption]
        </div>
        <div class="wrapper clearfix">
            [caption id="attachment_904" align="alignright" width="150"]<img class="wp-image-904 size-full" src="http://local.wordpress.dev/wp-content/uploads/2013/03/image-alignment-150x150.jpg" alt="Image Alignment 150x150" width="150" height="150" /> <code>.alignright</code>[/caption]
        </div>
        <div class="wrapper clearfix">
            [caption id="attachment_904" align="alignnone" width="150"]<img class="wp-image-904 size-full" src="http://local.wordpress.dev/wp-content/uploads/2013/03/image-alignment-150x150.jpg" alt="Image Alignment 150x150" width="150" height="150" /> <code>.alignnone</code>[/caption]
        </div>
    </div>
</section>

<section id="unorderedlists" class="styleguide">
    <h2>Unordered Lists</h2>
    <hr>
    <div class="display">
        <div class="row">
            <div class="column sm-6">
                <p class="label">Default</p>
                <ul>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum
                        <ul>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum
                                <ul>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="column sm-6">
                <p class="label"><code>.nobullet</code></p>
                <ul class="nobullet">
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum
                        <ul>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum
                                <ul>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="column sm-6">
                <p class="label"><code>.square</code></p>
                <ul class="square">
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum
                        <ul>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum
                                <ul>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="column sm-6">
                <p class="label"><code>.circle</code></p>
                <ul class="circle">
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum
                        <ul>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum
                                <ul>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="column sm-6">
                <p class="label"><code>.bordered</code></p>
                <ul class="bordered">
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum</li>
                    <li>Vehicula Dapibus Tellus Fermentum
                        <ul>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum</li>
                            <li>Vehicula Dapibus Tellus Fermentum
                                <ul>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                    <li>Vehicula Dapibus Tellus Fermentum</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="forms">
    <h3>Inputs</h3>
    <div class="display">
        <label for="text">Text</label>
        <input type="text" placeholder="[type='text']">
        <input type="password" placeholder="[type='password']">
        <input type="number" placeholder="[type='number']">
        <input type="email" placeholder="[type='email']">
        <input type="tel" placeholder="[type='tel']">
        <input type="date" placeholder="[type='date']">
        <input type="datetime" placeholder="[type='datetime']">
        <input type="search" placeholder="[type='search']">
        <input type="time" placeholder="[type='time']">
        <input type="url" placeholder="[type='url']">
        <input type="color" placeholder="[type='color']">
        <input type="range" placeholder="[type='range']">
        <input type="week" placeholder="[type='week']">
        <div class="group">
            <label for="#"><input type="checkbox"> Checkbox</label>
            <label for="#"><input type="checkbox"> Checkbox</label>
            <label for="#"><input type="checkbox"> Checkbox</label>
        </div>

    	<fieldset>
         	<legend>Fieldset With Radio Group</legend>
            <label for="r1"><input id="r1" type="radio" name="radio" value="1"> Radio 1</label>
            <label for="r2"><input id="r2" type="radio" name="radio" value="2"> Radio 2</label>
            <label for="r3"><input id="r3" type="radio" name="radio" value="3"> Radio 3</label>
        </fieldset>
        <textarea></textarea>
    </div>
</section>