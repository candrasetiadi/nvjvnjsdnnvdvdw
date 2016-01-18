@extends('index')
<?php $title = trans('word.about') ?>
@section('title', "$title")
@section('content')

<div class="content">
    <article class="custom-page">
        <h1 class="title_page">{{ trans('word.about_us') }}</h1>
        <h3>Our Story</h3>
        <p>Warisan was established in 1989 as a purveyor of high quality antiques and eventually grew to become a modern hospitality furniture production facility, with various offices and showrooms worldwide (see Offices and Showrooms).  We are able to fulfill large contract furniture orders, while still being small and hands on enough to supply more specialized orders (whether that be a private residence or a boutique café or the public areas of a hotel). Over 85% of what we produce is according to custom specifications, but we do carry over 500 of our own models in our existing collections.  Many of these have been selected and “tweaked” by designers to make them their own.</p>
        <p>We are pleased to have a team of over 400 craftsman, designers, project leaders, and staff working together to produce goods at the highest quality and within competitive pricing.  We aim to please.  We place a strong emphasis on attention to detail.</p>
        <p>Our greatest asset is our team.  Their flexibility and creative problem solving ability cannot be underestimated.  Second only to our team, is the wonderful natural resources that exist within close reach of our production facility.  The possibilities for creativity become endless.  And with clear conscience, too, as we only use wood from government sustained plantations!  Some of the vast amount of locally available materials are shown in the “materials” section.</p>
        <p>Our global set up enables us to provide logistic support to our clients, and assures  them of a continuity of service from design to delivery across various time zones.  Our sales and administration staff strives to leverage all available resources to get your orders out on time in order to maximize client satisfaction.</p>
        <p>Find within this web page an extensive data base of images with a full search engine. Should you have need of a high resolution photo or a material swatch, don’t hesitate to contact us.  Many of our latest works can be seen in the recent custom works tab.</p>
        <p>Notice the diversity of existing products created by our in-house design team. That same team is available to serve designers in realizing their own goals within any given project.</p>
        <p>The Warisan Team</p>

        <h3>The Artisan Approach ARTISAN APPROACH</h3>
        <p>Since Warisan Furniture is born, Gianpoalo and Lucio aimed putting an important emphasis  on a  important aspects and guidelines that drive us nowadays as the Warisan Family which were the following: having good materials tool and skills to create the high quality and finishes furntiure pieces.</p>
        <p>Nowadays, tought coming from Gianpaolo &amp; Lucio themselewes are still alive and we keep going on the folliwing lines:</p>
        <h3>The Material Selection.</h3>
        <p>Indonesia is quite unique in the world as it has over 3 million hectares of Teak and Mahogany plantation. These plantations are government owned and managed with sustainable criteria.</p>
        <p>Warisan is engaged to strictly uses certificated legal Perhutani Plantation Hard woods.</p>
        <p>We have learn from our experience to sleect and perform with the highest quality materials woods metals and fabrics as we controle the all production process.</p>
        <p>Warisan is engaged to strictly uses certificated legal Perhutani  Plantation Hard woods.</p>
        <h3>Hundreds of Skilled Hands Crafting</h3>
        <p>We are pleased to have a team of over 400 craftsman, designers, project leaders, and staff working together to produce goods at the highest quality and within competitive pricing.  We strive to optimize the skilss of our carpentry team, supporting and sharing their talents with appropriates mechanized porcesses in order to achieve artisan quality in higher volume.</p>
        <p>A our production is is a fully intagrated process we guarranty a strict quality-controlled production process: From log selection and sawmill to air and kiln drying up to production and finishing.</p>
        <h3>Design concept management</h3>
        <p>Warisan’s passionate team of designers and technical advisors are up for the challenge. Our team of project managers, technical advisors , and designer/Draftsmen is here to serve. We appreciate working closely with our clients, their appointed interior designers and procurement agents to efficiently process the information prensented to us, offering creative solutions and techncal advice to help each project meet specification requirements, budgets and time lines.</p>

        <h3>Sustainability</h3>
        <p>Also we recycle our offcuts and scraps to fire our ovens.</p>
        <p>In addition to plantation hardwoods, we seek to use other sustainable materials such as: reclaimed timber, cultivated seashells and other highly renewable resources such as bamboo.</p>
        <p>In our production we emphasize the use of the resources of Indonesia in particular renewable resources.   http://warisan.com/userfiles/perhutani-01.jpg</p>
        <p>SOLID WOOD, The main timbers available in Indonesia are TEAK and MAHOGANY that are purchased from Government plantations (PERHUTANI) and occasionally from private plantations. Since teak and mahogany are  native to Indonesia, we can be sure that all availability of these two woods are plantation products. We also use INDONESIAN ROSEWOOD (Sonokeling), however the quantity available of this beautiful wood is limited, so we use it for accents or small productions.</p>
        <p>Other woods from plantations are PINE and DAMMAR, but owing to their lower quality, we use them only in some structural, non visible parts. Another wood similar to teak in color, but not as hard is CHINA BERRY (Mindi), that we purchase from small private plantations. Beside these timbers we avoid any other hard wood, in particular MERBAU, a beautifulhard wood which is native to Irian Jaya, and has been illegally logged in recent years . The export is now prohibited by the Government.</p>
        <p>In addition to Indonesian timber, we can import other timbers from any part of the world. The Indonesian government has recently improved conditions for importers to secure imported wood to nourish the growing furniture industries in this country.</p>
        <p>We use also VENEERS, particularly for cabinets and side boards. The substrate of veneers can be plywood or MDF (Medium-Density Fiberboard). Since plywood is low quality wood , coming from forests of dubious sustainability, we prefer to use MDF, which is a by product of the wood working process. The veneers in TEAK, MAHOGANY and ROSEWOOD are produced in Indonesia, but we can import any veneer in the world and have it laminated.</p>
    </article>

    <article class="custom-page" id="about-faqs-section">
        <h1 class="title_page">FAQs</h1>
        <ul>
            <li>
                <div class="expandable-item">
                    <h3>How can I contact Warisan?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Please contact <a href="{{ baseUrl() . '/' . trans('url.contact') }}">here</a></p>
                    </div>
                </div>
            </li>

            <li>
                <div class="expandable-item">
                    <h3>Do you have a catalogue?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Yes you will be able to see a large range of our standard collection here                             (warisan.com/catalogue)
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>Where do I address my purchase order?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Every Purchase orders  can be sent to sales@warisan.com or to your closest authorized Warisan representative, see the list here."</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>What is the warranty? Does the furniture has warranty?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>At Warisan you get a 25 years of knowledge that are able to warranty high quality hand made furniture. With our skilled team, each, Warisan products are controled in house during  the all process until the delivery. That’s why we stand to be free of manufactures defect. In that unfortunate special case your are facing a concern on our quality standard, we will consider you report and we wil take the proper measures to address your concern.</p>
                        <p>All our products have a 2 years warranty</p>
                        <p>See more:here (warisan.com/warranty)</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>Do You customize?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Many times people ask us, “Do you customize?”  Our Answer is yes as long as you don’t mean copying someone else’s work.  Now we realize that copying is the highest form of flattery but we suggest a better approach as this:</p>
                        <ul>
                            <li>Consider what it is that you really like about the piece.  Is it the color?  Is it the proportion?  The shape?  Or is it the combo of materials?  Is it a special curved or carved element?  Is it how the upholstery is detailed?</li>
                            <li>Take whatever aspect or aspects that you felt impacted you and find a way to make them your own. Let their expression inspire your expression.</li>
                            <li>So be inspired. Be influenced.</li>
                            <li>But please don’t ask us to copy others work.</li>
                        </ul>
                        <p>Others want to know to what level  we will customize.  Well, if you can dream it, we will try to figure out how to make it.  Having said that, you need to let us know in advance your time restraints and budget limitations, so we can design with that knowledge in mind."</p>
                        <p>Easy customization is taking an existing piece of ours and tweaking it.  We don’t mean just changing the size or dimensions and color, because of course we can do that.   Rather we mean making one of our pieces your own!"</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>What is the delivery time?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>We comitte oursleves  to ensurie  that you receive your Warisan Product as quickly as possible. Our sales team and representatives will be able to detail deeper  the answer according to your furniture</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>Where do I find the dimensions of a piece of furniture?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Is it possible to find the dimensions on the Product detail. Please click here for an example. ( example prodcut size warisan.com/product...."</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>Why are there no prices shown on your web site?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>As a showcase of our abilities, warisan.com is a manufacterer’s website designed to show a range of our furniture. We don’t show prices on this site because Warisan are independantly operated depending of you standard or customization requests."</p>
                        <p>Please find out the nearest Showroom.here"</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="expandable-item">
                    <h3>Is everything Warisan makes shown on the website?</h3>
                    <input type="checkbox" class="checkbox" value="checkbox">
                    <i class="material-icons">keyboard_arrow_down</i>
                    <div class="expand-wrapper">
                        <p>Warisan.com has been designed to show you a large range of our knowledge and capabilities. This wesite doesn’t feature every style we make as some of our request for clients are copyright and we do respect they privacy.</p>
                    </div>
                </div>
            </li>
        </ul>
    </article>

    <article class="custom-page" id="about-warranty-section">
        <h1 class="title_page">{{ trans('word.warranty') }}</h1>
        <div class="warranty"><img id="certificate" src="{{ asset('assets/img/perhutani-01.jpg') }}"></div>
        <div>
            <p>
                All Warisan standard furniture comes with a 12 month warranty/guarantee. Warisan furniture is made with only high quality raw materials, fittings and finishes.
            </p>
            <p>
                The processing and drying of all wood is done in-house, so furniture moisture content (MC) is strictly controlled and quality maintained. Hardware, often imported, is made according to designer specification.  International Hardware companies also offer their own guarantee.
            </p>
            <p>
                In the unlikely event that an item provided by Warisan does not meet the requirements of standard hospitality usage (said standards being discussed prior to production), we request that the purchaser notify us in writing with details of the problem, including photos, conditions of delivery, conditions of onsite usage, which delivery/PO, etc.  After a claim has been verified and liabilities appointed, Warisan will negotiate the appropriate steps for repair and/or replacement in a timely/cost effective manner for all parties.
            </p>
            <p>
                Exceptions:
                Warisan cannot be held responsible for damages within the container.  All goods should be insured.  To make an insurance claim for shipping damages have to be photographed immediately upon opening the container and as the damages are exposed. Warisan cannot be held responsible for damage caused in transit, or due to improper handling or storage. On client-designed, custom-made furniture, we cannot always guarantee the furniture performance and, as such, all custom designs should be carefully considered BY CLIENT prior to manufacture.
            </p>
            <p>
                Warisan cannot be held responsible for furniture problems due to poor design by either clients or third parties, especially when appropriate time for research development and testing have not been allowed. Antiques, Art Furniture, Roots, Slab Furniture, and “Origins” style furniture may have natural material imperfections which are beyond the control of Warisan. Such imperfections make them unique, we will ensure that they are delivered in good condition and fit for the purpose intended.
            </p>
            <p>
                Massively thick/heavy items are likely to experience natural, non-structural cracking. All knock-down items will come with assembly instructions, fixings and we will provide touch-up kits with all large orders, to help the installers on site deal with any scratches, marks, etc.
            </p>
            <p>
                The Managing Director<br>
                <strong>PT. WARISAN EURINDO</strong>
            </p>
        </div>
    </article>
</div>
@stop


@section('scripts')
<script>

    $(window).load(function() {

        if(window.location.hash) {

            hashSlide();
        }
    });

    $(window).on('hashchange', function(){

        hashSlide();
    });

    $(document).on('click', '#certificate', function() {

        $('#certificate-modal').addClass('active');
    });

    $(document).on('click', '.close-modal', function() {

        $('#certificate-modal').removeClass('active');
    });

    function hashSlide() {

        var pageHash = window.location.href.split('#')[1];

        switch(pageHash) {

            case 'faqs':

                $('html, body').animate({scrollTop: ($("#about-faqs-section").offset().top - 24)}, 1000);

                break;

            case 'warranty':

                $('html, body').animate({scrollTop: ($("#about-warranty-section").offset().top - 24)}, 1000);

                break;
        }
    }

</script>
@stop
