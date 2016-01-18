@extends('index')
<?php $title = trans('word.materials') ?>
@section('title', "$title")
@section('content')

<div class="content materials-page">
    <div class="wrapper">

        <div class="intro">
            <h1 class="title_page">Materials and Finishes</h1>
            <h1>Materials and Finishes</h1>
            <p>
                In our production we emphasize the use of the resources of Indonesia in particular renewable resources.
            </p>
            <p>
                <strong>SOLID WOOD</strong>, The main timbers available in Indonesia are <strong>TEAK</strong> and <strong>MAHOGANY</strong> that are purchased from Government plantations (PERHUTANI) and occasionally from private plantations. Since teak and mahogany are not native to Indonesia, we can be sure that all availability of these two woods are plantation products. We also use <strong>INDONESIAN ROSEWOOD</strong> (Sonokeling), however the quantity available of this beautiful wood is limited, so we use it for accents or small productions.
            </p>
            <p>
                Other woods from plantations are PINE and DAMMAR, but owing to their lower quality, we use them only in some structural, non visible parts. Another wood similar to teak in color, but not as hard is CHINA BERRY (Mindi), that we purchase from small private plantations. Beside these timbers we avoid any other hard wood, in particular MERBAU, a beautifulhard wood which is native to Irian Jaya, and has been illegally logged in recent years . The export is now prohibited by the Government.
            </p>
            <p>
                In addition to Indonesian timber, we can import other timbers from any part of the world. The Indonesian government has recently improved conditions for importers to secure imported wood to nourish the growing furniture industries in this country.
            </p>
            <p>
                We use also VENEERS, particularly for cabinets and side boards. The substrate of veneers can be plywood or <strong>MDF (Medium-Density Fiberboard)</strong>. Since plywood is low quality wood , coming from forests of dubious sustainability, we prefer to use MDF, which is a by product of the wood working process. The veneers in TEAK, MAHOGANY and ROSEWOOD are produced in Indonesia, but we can import any veneer in the world and have it laminated .
            </p>

            <p style="color: #bc121d;">
                <a href="/pdfcatalogue/1452568448.pdf" style="padding:40px 0;"><h2><i class="material-icons" style="font-size:35px; margin-top:4px;">keyboard_arrow_right</i>View Catalog</h2></a>
            </p>
            <p style="color: #bc121d;">
                <a href="{{ baseUrl() . '/' . trans('url.fabrics') }}"><h2><i class="material-icons" style="font-size:35px; margin-top:4px;">keyboard_arrow_right</i>View Fabrics</h2></a>
            </p>
        </div>
    </div>

    <div class="collumn-wrapper">
        <div class="col left">
            <a href class="material-item">
                <div class="block block-1">
                    <img src="{{ asset('assets/img/col-1-picture-1.png') }}">
                    <div class="desc">
                        <h2>Rattan</h2>
                        <p>is an important product of Indonesia and so is BAMBOO, of which several qualities are available in this country</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-2">
                    <div class="desc">
                        <h2>Glass</h2>
                        <p>is another important product of Indonesia and is available in several types and qualities.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-3">
                    <div class="desc">
                        <h2>Hardware</h2>
                        <p>is imported, mainly from Germany (Hafele or others). Lower and cheaper quality hardware is also available locally.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-4">
                    <div class="desc">
                        <h2><span class="small-h2">OLD</span><br>TEAKWOOD PLANKS</h2>
                        <p>Colours &amp; Finishes Aged Teak wood comes from old buildings and other aged structures. Surface indentations and imperfections are usual, we deliberately enhance these imperfections and at times distress the wood. Available also in White Wash. Varnish finishes: Shellac, for indoor use only.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-5"></div>

            </a>
            <a href class="material-item">
                <div class="block block-6">
                    <div class="desc">
                        <h2>VENEERS</h2>
                        <p>We use veneers mainly for sideboards, table tops or cabinets. A full range of veneers are readily available in Indonesia from local woods or from overseas.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-7">
                    <div class="desc">
                        <h2>STONE</h2>
                        <p>Solid stone frame with wooden panels.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-8">
                    <div class="desc">
                        <h2>ALTERNATIVE PLANTATION WOOD</h2>
                        <p>Colours &amp; Finishes Teak wood from Indonesian Plantations. German Water Soluble Stain coloring, non toxic. Varnish finishes: Nitro Cellulose, Polyurethane. NC is water resistant and PU is water and alcohol resistant. For indoor use only. No melamine is used on our products.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col middle">
            <a href class="material-item">
                <div class="block block-1">
                    <div class="desc">
                        <h2><span class="small-h2">SYNTHETIC</span><br>RATTAN</h2>
                        <p>is now available and produced under liscence.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-2">
                    <div class="desc">
                        <h2>STONE &amp; MARBLE</h2>
                        <p>are available in large quantities and diverse qualities from quarries spread all over Indonesia, but finer varieties are imported mainly from India and China.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-3">
                    <div class="desc">
                        <h2><span class="small-h2">PLANTATION</span><br>
                            TEAK WOOD</h2>
                        <p>Colours &amp; Finishes Teak wood from Indonesian Plantations. German Water Soluble Stain coloring, non toxic. Varnish finishes: Nitro Cellulose, Polyurethane. NC is water resistant and PU is water and alcohol resistant. For indoor use only. No melamine is used on our products.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-4">
                    <div class="desc">
                        <h2>RATTAN &amp; <br><span class="small-h2">OTHER WOVEN MATERIALS</span></h2>
                        <p>Rattan can be woven in many different ways and in various thicknesses. Pending on its weave and character it is suitable for either seats &amp; backs of chairs, table and tray bases, doors panels and accessories. It is offered in several colors, finished with Nitro Cellulose or Poly Urethane. Other grasses are also used for various styles, e.g. Sea Grass, Banana Leaves and Water Hyacinth can be woven and used for chairs, mats and baskets. Woven raffia, made from jute, polyester or viscose is used primarily for upholstery.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-5">
                    <div class="desc">
                        <h2>TERRAZZO</h2>
                        <p>Panels (out sourced) applied to wooden frame.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-6">
                    <div class="desc">
                        <h2>OUTDOOR FINISHES</h2>
                        <p>Teak wood from Indonesian Plantations, Kiln Dried. Finishes: Natural Wax, Natural Teak Oil, Caustic Soda, Cherry/Oil, Dark Outdoor.</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col right">
            <a href class="material-item">
                <div class="block block-1">
                    <div class="desc">
                        <h2>Shells</h2>
                        <p>are available in great quantities and variety, but we only purchase from farms or recycle the shells left over from the abundance of shell food eaten everyday.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-2">
                    <div class="desc">
                        <h2>FABRIC &amp; LEATHER</h2>
                        <p>aare locally produced or imported. SUNBRELLA is readily available.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-3">
                    <div class="desc">
                        <h2><span class="small-h2">PLANTATION</span><br>
                            MAHAGONY WOOD</h2>
                        <p>Colours &amp; Finishes Mahogany wood from Indonesian Plantations. Water Soluble Stain coloring. Varnish finishes: Nitro Cellulose or Polyurethane. For indoor use only.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-4">
                    <div class="desc">
                        <h2><span class="small-h2">ACCENT</span><br> WOODS</h2>
                        <p>We use mainly Coconut Palm Wood and Indonesian Rosewood (Sonokeling). Beautiful in it’s natural color. Finishing in Nitro Cellulose or Polyurethane.</p>
                    </div>
                </div>
            </a>
            <a href class="material-item">
                <div class="block block-5"></div>
            </a>
            <a href class="material-item">
                <div class="block block-6">
                    <div class="desc">
                        <h2>MARBLE</h2>
                        <p>Marbles, Granites and Stone Slates are all readily accessible from local quarries or imported. We can also create interesting patterns with inlaid of different marbles.</p>
                    </div>
                </div>
            </a>

            <a href class="material-item">
                <div class="block block-7">
                    <div class="desc">
                        <h2>BAMBOO</h2>
                        <p>Bamboo is used either as full poles, slats, crushed or woven sheets. It is chemically treated, to avoid bug infiltration. As a natural material, variations in colour and markings are to be expected.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@stop

@section("scripts")
<script>
    $(document).on('click', '.material-item', function(e) {

        e.preventDefault();
    })
</script>
@stop
