<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="sidebar-brand-text align-middle">
                PANACO
                <sup><small class="badge bg-primary text-uppercase">Admin</small></sup>
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewbox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ url('/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{ route('produits.index') }}" data-bs-target="#pages" class="sidebar-link">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Produits</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Parametres</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('categories.index') }}">Categories
                            Produit</a></li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Emo Touch Group</strong>
                <div class="mb-3 text-sm">
                    Get in touch with Emo Touch Group to command your software
                </div>

                <div class="d-grid">
                    <a href="index-1.htm" class="btn btn-outline-primary" target="_blank">Conact now</a>
                </div>
            </div>
        </div>
    </div>
</nav>
