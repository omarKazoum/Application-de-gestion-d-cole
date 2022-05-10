
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow" id="NAVBAR_PAGE_NAVBAR">
        <div class="container">
            <a class="navbar-brand" id="LOGO" href="index.php">
                <img src="public/assets//img//logo1.png" alt="logo website" id="LOGO_WEBSITE">
            </a>
            <!----Button menu--->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"
                aria-controls="navmenu" aria-expanded="false" aria-label="Toggle navigation"
                style="background-color: #FF8303;">
                <!-------icon menu--->
                <span class="navbar-toggler-icon"></span>
            </button>
            <!----Content navbar--->
            <div class="collapse navbar-collapse" id="navmenu">
                <!--Input search group -->
                <div class="w- input-group d-flex justify-content-start justify-content-md-end">
                    <input type="text" class="form-md shadow" placeholder="Search" aria-label="Search"
                        aria-describedby="basic-addon2" id="INPUT_SEARCH">
                    <div class="input-group-append">
                        <button class="btn " type="button" id="BUTTON_SEARCH"><i id="ICON_SEARCH"
                                class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row d-flex flex-direction-column align-items-end mt-4">
            <div class="col-1 bg-white" id="SIDE_BAR">
                <ul>
                    <li>
                        <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Apprenant">
                            <i class="bi bi-person-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Professeur">
                            <i class="bi bi-briefcase-fill"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Administrateur">
                            <i><span class="material-symbols-outlined ICON_POSITION">
                                    admin_panel_settings
                                </span></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Parents">
                            <i><span class="material-symbols-outlined ICON_POSITION">
                                    family_restroom
                                </span></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout">
                            <i class="bi bi-box-arrow-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>