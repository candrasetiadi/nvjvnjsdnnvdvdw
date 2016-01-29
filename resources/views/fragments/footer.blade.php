

<footer>
    <section class="app-footer">
        <div>
            <h2>Blog</h2>
            <ul>
                <li><a href="">Investissement villa Bali</a></li>
                <li><a href="">Tourist Destination</a></li>
                <li><a href="">Uncategorized</a></li>
            </ul>
        </div>
        <div>
            <h2>Links</h2>
            <ul>
                <li><a href="">Resource</a></li>
                <li><a href="">Site Map</a></li>
                <li><a href="">Sold Villas</a></li>
            </ul>
        </div>
        <div>
            <h2>Accounts</h2>
            <ul>
                <li><a href="">My Account</a></li>
                <li><a href="">Favorites</a></li>
            </ul>
        </div>
        <div>
            <h2>Partners</h2>
            <ul>
                <li><a href="">Bali Je t’aime</a></li>
                <li><a href="">Atlantis International</a></li>
            </ul>
        </div>
        <div class="gicontact">
            <div class="flexbox flexbox-wrap justify-between">
                <?php $social = social(); ?>
                @if(isset($social->facebook))
                <a href="{{ $social->facebook }}" target="_blank"><span class="icon-facebook"></span></a>
                @endif
                @if(isset($social->google))
                <a href="{{ $social->google }}" target="_blank"><span class="icon-google-plus"></span></a>
                @endif
                @if(isset($social->twitter))
                <a href="{{ $social->twitter }}" target="_blank"><span class="icon-twitter"></span></a>
                @endif
                @if(isset($social->linkedin))
                <a href="{{ $social->linkedin }}" target="_blank"><span class="icon-linkedin"></span></a>
                @endif
                @if(isset($social->youtube))
                <a href="{{ $social->youtube }}" target="_blank"><span class="icon-youtube"></span></a>
                @endif
                @if(isset($social->skype))
                <a href="{{ $social->skype }}" target="_blank"><span class="icon-skype"></span></a>
                @endif
            </div>
            <div class="input">
                <input type="text" placeholder="Subscribe to our newsletter">
                <div class="fab-button fab-button-small  fab-button-transparent">
                    <a href=""><i class="material-icons">done</i></a>
                </div>
            </div>
            <div class="copyright">&copy; Copyright 2016 - Kibarer Development</div>
        </div>
    </section>
</footer>
