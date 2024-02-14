
<!DOCTYPE html>
<html lang="en-GB"
      dir="ltr"
      class="">
<head>
    <title>Logging in to the demo... | BookStack Demo</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="token" content="3OltTZcFIl6N3iPvZJnskBU2BLlsnCve0cZVesuM">
    <meta name="base-url" content="https://demo.bookstackapp.com">
    <meta name="theme-color" content="#206ea7"/>

    <!-- Social Cards Meta -->
    <meta property="og:title" content="Logging in to the demo... | BookStack Demo">
    <meta property="og:url" content="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site">
        <meta property="og:description" content="This demo site has the following credentials:
Email: admin@example.comPassword: password
You can a...">

    <!-- Styles and Fonts -->
    
    <link rel="stylesheet" href="https://demo.bookstackapp.com/dist/styles.css?version=v23.01.1">
    <link rel="stylesheet" media="print" href="https://demo.bookstackapp.com/dist/print-styles.css?version=v23.01.1">

    <!-- Icons -->
    <link rel="icon" type="image/png" sizes="256x256" href="https://demo.bookstackapp.com/icon.png">
    <link rel="icon" type="image/png" sizes="180x180" href="https://demo.bookstackapp.com/icon-180.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://demo.bookstackapp.com/icon-180.png">
    <link rel="icon" type="image/png" sizes="128x128" href="https://demo.bookstackapp.com/icon-128.png">
    <link rel="icon" type="image/png" sizes="64x64" href="https://demo.bookstackapp.com/icon-64.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://demo.bookstackapp.com/icon-32.png">

    
    <!-- Custom Styles & Head Content -->
    <style>
        #header
        {
            background-color: blue;
        }
    :root {
        --color-primary: #206ea7;
        --color-primary-light: rgba(32,110,167,0.15);
        --color-link: #206ea7;
        --color-bookshelf: #a94747;
        --color-book: #077b70;
        --color-chapter: #af4d0d;
        --color-page: #206ea7;
        --color-page-draft: #7e50b1;
    }
</style>
    
    
    <!-- Translations for JS -->
    </head>
<body
          class=" tri-layout ">

        <a class="px-m py-s skip-to-content-link print-hidden" href="#main-content">Skip to main content</a>    




    <header id="header" component="header-mobile-toggle" class="primary-background bg-dark">
    <div class="grid mx-l">

        <div>
            <a href="" data-shortcut="home_view" class="logo">
                                    <img class="logo-image" src="https://demo.bookstackapp.com/logo.png" alt="Logo">
                                                    <span class="logo-text">Library</span>
                            </a>
            <button type="button"
                    refs="header-mobile-toggle@toggle"
                    title="Expand Header Menu"
                    aria-expanded="false"
                    class="mobile-menu-toggle hide-over-l"><svg class="svg-icon" data-icon="more" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
</svg></button>
        </div>

        <div class="flex-container-column items-center justify-center hide-under-l">
                        <form component="global-search" action="https://demo.bookstackapp.com/search" method="GET" class="search-box" role="search" tabindex="0">
                <button id="header-search-box-button"
                        refs="global-search@button"
                        type="submit"
                        aria-label="Search"
                        tabindex="-1"><svg class="svg-icon" data-icon="search" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg></button>
                <input id="header-search-box-input"
                       refs="global-search@input"
                       type="text"
                       name="term"
                       data-shortcut="global_search"
                       autocomplete="off"
                       aria-label="Search" placeholder="Search"
                       value="">
                <div refs="global-search@suggestions" class="global-search-suggestions card">
                    <div refs="global-search@loading" class="text-center px-m global-search-loading"><div class="loading-container">
    <div></div>
    <div></div>
    <div></div>
    </div></div>
                    <div refs="global-search@suggestion-results" class="px-m"></div>
                    <button class="text-button card-footer-link" type="submit">View All</button>
                </div>
            </form>
                    </div>

        <nav refs="header-mobile-toggle@menu" class="header-links">
            <div class="links text-center">
                                    <a class="hide-over-l" href="https://demo.bookstackapp.com/search"><svg class="svg-icon" data-icon="search" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>Search</a>
                                            <a href="" data-shortcut="shelves_view"><svg class="svg-icon" data-icon="bookshelf" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M1.088 2.566h17.42v17.42H1.088z" fill="none"/><path d="M4 20.058h15.892V22H4z"/><path d="M2.902 1.477h17.42v17.42H2.903z" fill="none"/><g><path d="M6.658 3.643V18h-2.38V3.643zM11.326 3.643V18H8.947V3.643zM14.722 3.856l5.613 13.214-2.19.93-5.613-13.214z"/></g></svg>Briefcase</a>
                                        <a href="" data-bs-shortcut="books_view"><svg class="svg-icon" data-bs-icon="books" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19.252 1.708H8.663a1.77 1.77 0 0 0-1.765 1.764v14.12c0 .97.794 1.764 1.765 1.764h10.59a1.77 1.77 0 0 0 1.764-1.765V3.472a1.77 1.77 0 0 0-1.765-1.764zM8.663 3.472h4.412v7.06L10.87 9.208l-2.206 1.324z"/><path d="M30.61 3.203h24v24h-24z" fill="none"/><path d="M2.966 6.61v14c0 1.1.9 2 2 2h14v-2h-14v-14z"/></svg>Folder</a>
                                        <a href="" data-bs-shortcut="books_view"><svg class="svg-icon" data-bs-icon="books" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19.252 1.708H8.663a1.77 1.77 0 0 0-1.765 1.764v14.12c0 .97.794 1.764 1.765 1.764h10.59a1.77 1.77 0 0 0 1.764-1.765V3.472a1.77 1.77 0 0 0-1.765-1.764zM8.663 3.472h4.412v7.06L10.87 9.208l-2.206 1.324z"/><path d="M30.61 3.203h24v24h-24z" fill="none"/><path d="M2.966 6.61v14c0 1.1.9 2 2 2h14v-2h-14v-14z"/></svg>Shop</a>
                                                        
                                                        <a href="https://demo.bookstackapp.com/login"><svg class="svg-icon" data-icon="login" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M21 3.01H3c-1.1 0-2 .9-2 2V9h2V4.99h18v14.03H3V15H1v4.01c0 1.1.9 1.98 2 1.98h18c1.1 0 2-.88 2-1.98v-14c0-1.11-.9-2-2-2zM11 16l4-4-4-4v3H1v2h10v3z"/>
</svg>Log in</a>
                            </div>
                    </nav>

    </div>
</header>

    <div id="content" components="tri-layout" class="block">
        
    <div class="tri-layout-mobile-tabs print-hidden">
        <div class="grid half no-break no-gap">
            <button type="button"
                    refs="tri-layout@tab"
                    data-tab="info"
                    aria-label="Tab: Show Secondary Information"
                    class="tri-layout-mobile-tab px-m py-m text-link">
                Info
            </button>
            <button type="button"
                    refs="tri-layout@tab"
                    data-tab="content"
                    aria-label="Tab: Show Primary Content"
                    aria-selected="true"
                    class="tri-layout-mobile-tab px-m py-m text-link active">
                Content
            </button>
        </div>
    </div>

    <div refs="tri-layout@container" class="tri-layout-container"  >

        <div class="tri-layout-left print-hidden" id="sidebar">
            <aside class="tri-layout-left-contents">
                
    
    
    
    <nav id="book-tree"
     class="book-tree mb-xl"
     aria-label="Book Navigation">

    <h5>Book Navigation</h5>

    <ul class="sidebar-page-list mt-xs menu entity-list">
                    <li class="list-item-book book">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site" class="book   entity-list-item" data-entity-type="book" data-entity-id="1">
    <span role="presentation" class="icon text-book"><svg class="svg-icon" data-icon="book" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">BookStack Demo Site</h4>
            
    </div>
</a>            </li>
        
                    <li class="list-item-page page ">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site" class="page  selected entity-list-item" data-entity-type="page" data-entity-id="1">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Logging in to the demo site</h4>
            
    </div>
</a>
                
            </li>
                    <li class="list-item-chapter chapter ">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/chapter/content-examples" class="chapter   entity-list-item" data-entity-type="chapter" data-entity-id="1">
    <span role="presentation" class="icon text-chapter"><svg class="svg-icon" data-icon="chapter" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Content Examples</h4>
            
    </div>
</a>
                                    <div class="entity-list-item no-hover">
                        <span role="presentation" class="icon text-chapter"></span>
                        <div class="content">
                            <div component="chapter-contents" class="chapter-child-menu">
    <button type="button"
            refs="chapter-contents@toggle"
            aria-expanded="false"
            class="text-muted chapter-contents-toggle ">
        <svg class="svg-icon" data-icon="caret-right" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.5 17.5l5-5-5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg> <svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg> <span>4 Pages</span>
    </button>
    <ul refs="chapter-contents@list"
        class="chapter-contents-list sub-menu inset-list "         role="menu">
                    <li class="list-item-page " role="presentation">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/mixed-content-example-page" class="page   entity-list-item" data-entity-type="page" data-entity-id="2">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Mixed Content Example Page</h4>
            
    </div>
</a>            </li>
                    <li class="list-item-page " role="presentation">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/header-level-examples" class="page   entity-list-item" data-entity-type="page" data-entity-id="3">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Header Level Examples</h4>
            
    </div>
</a>            </li>
                    <li class="list-item-page " role="presentation">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/code-examples" class="page   entity-list-item" data-entity-type="page" data-entity-id="4">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Code Examples</h4>
            
    </div>
</a>            </li>
                    <li class="list-item-page " role="presentation">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/video-embed-example" class="page   entity-list-item" data-entity-type="page" data-entity-id="5">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Video Embed Example</h4>
            
    </div>
</a>            </li>
            </ul>
</div>                        </div>
                    </div>

                
            </li>
                    <li class="list-item-page page ">
                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/template-page" class="page   entity-list-item" data-entity-type="page" data-entity-id="24">
    <span role="presentation" class="icon text-page"><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
    <div class="content">
            <h4 class="entity-list-item-name break-text">Template Page</h4>
            
    </div>
</a>
                
            </li>
            </ul>
</nav>            </aside>
        </div>

        <div class=" tri-layout-middle">
            <div id="main-content" class="tri-layout-middle-contents">
                
    <div class="mb-m print-hidden">
        <nav class="breadcrumbs text-center" aria-label="Breadcrumb">
    
    
            <a href="https://demo.bookstackapp.com/books" class="text-book icon-list-item outline-hover">
            <span><svg class="svg-icon" data-icon="books" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M19.252 1.708H8.663a1.77 1.77 0 0 0-1.765 1.764v14.12c0 .97.794 1.764 1.765 1.764h10.59a1.77 1.77 0 0 0 1.764-1.765V3.472a1.77 1.77 0 0 0-1.765-1.764zM8.663 3.472h4.412v7.06L10.87 9.208l-2.206 1.324z"/><path d="M30.61 3.203h24v24h-24z" fill="none"/><path d="M2.966 6.61v14c0 1.1.9 2 2 2h14v-2h-14v-14z"/></svg></span>
            <span>Books</span>
        </a>
            
    
    
            
                
                                    <div class="dropdown-search" components="dropdown dropdown-search"
     option:dropdown-search:url="/search/entity/siblings?entity_type=book&entity_id=1"
     option:dropdown-search:local-search-selector=".entity-list-item"
>
    <div class="dropdown-search-toggle-breadcrumb" refs="dropdown@toggle"
         aria-haspopup="true" aria-expanded="false" tabindex="0">
        <div class="separator"><svg class="svg-icon" data-icon="chevron-right" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg></div>
    </div>
    <div refs="dropdown@menu" class="dropdown-search-dropdown card" role="menu">
        <div class="dropdown-search-search">
            <svg class="svg-icon" data-icon="search" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>            <input refs="dropdown-search@searchInput"
                   aria-label="Search"
                   autocomplete="off"
                   placeholder="Search"
                   type="text">
        </div>
        <div refs="dropdown-search@loading">
            <div class="loading-container">
    <div></div>
    <div></div>
    <div></div>
    </div>        </div>
        <div refs="dropdown-search@listContainer" class="dropdown-search-list px-m" tabindex="-1"></div>
    </div>
</div>                        <a href="https://demo.bookstackapp.com/books/bookstack-demo-site" class="text-book icon-list-item outline-hover">
                <span><svg class="svg-icon" data-icon="book" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
</svg></span>
                <span>
                    BookStack Demo Site
                </span>
            </a>
                            
                            
                
                                    <div class="dropdown-search" components="dropdown dropdown-search"
     option:dropdown-search:url="/search/entity/siblings?entity_type=page&entity_id=1"
     option:dropdown-search:local-search-selector=".entity-list-item"
>
    <div class="dropdown-search-toggle-breadcrumb" refs="dropdown@toggle"
         aria-haspopup="true" aria-expanded="false" tabindex="0">
        <div class="separator"><svg class="svg-icon" data-icon="chevron-right" role="presentation"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/><path d="M0 0h24v24H0z" fill="none"/></svg></div>
    </div>
    <div refs="dropdown@menu" class="dropdown-search-dropdown card" role="menu">
        <div class="dropdown-search-search">
            <svg class="svg-icon" data-icon="search" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>            <input refs="dropdown-search@searchInput"
                   aria-label="Search"
                   autocomplete="off"
                   placeholder="Search"
                   type="text">
        </div>
        <div refs="dropdown-search@loading">
            <div class="loading-container">
    <div></div>
    <div></div>
    <div></div>
    </div>        </div>
        <div refs="dropdown-search@listContainer" class="dropdown-search-list px-m" tabindex="-1"></div>
    </div>
</div>                        <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site" class="text-page icon-list-item outline-hover">
                <span><svg class="svg-icon" data-icon="page" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
</svg></span>
                <span>
                    Logging in to the demo...
                </span>
            </a>
                    </nav>    </div>

    <main class="content-wrap card">
        <div component="page-display"
             option:page-display:page-id="1"
             class="page-content clearfix">
            <div dir="auto">

    <h1 class="break-text" id="bkmrk-page-title">Logging in to the demo site</h1>

    <div style="clear:left;"></div>

            <p id="bkmrk-this-demo-site-has-t">This demo site has the following credentials:</p>
<p id="bkmrk-email%3A%C2%A0admin%40exampl"><strong>Email:</strong> <a href="mailto:admin@example.com">admin@example.com</a><br><strong>Password:</strong> password</p>
<p id="bkmrk-you-can-access-the-l"><a href="https://demo.bookstackapp.com/login?email=admin@example.com&amp;password=password">You can access the login page with the above credentials pre-filled by clicking here</a>.</p>
<p id="bkmrk-the-demo-database-%26-" class="callout info"><strong>The demo database &amp; image storage is automatically reset every half hour</strong></p>
<p id="bkmrk-most-standard-action">Most standard actions are available using the provided admin login but some actions, listed below, have been restricted to keep the demo instance open &amp; available. That said, all options &amp; actions are at least visible to the demo admin user.</p>
<div id="bkmrk-actions-restricted-i"><strong>Actions Restricted In Demo</strong>
<ul>
<li>User deletion</li>
<li>User updates</li>
<li>Setting updates</li>
</ul>
</div>
    </div>        </div>
        <div component="pointer"
     option:pointer:page-id="1"
     id="pointer"
     class="pointer-container">
    <div class="pointer anim " >
        <span class="icon mr-xxs"><svg class="svg-icon" data-icon="link" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
</svg> <svg class="svg-icon" data-icon="include" role="presentation" style="display:none;"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 .5h24v24H0z" fill="none"/>
    <path d="M12 16.5l4-4h-3v-9h-2v9H8l4 4zm9-13h-6v1.99h6v14.03H3V5.49h6V3.5H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2v-14c0-1.1-.9-2-2-2z"/>
</svg></span>
        <div class="input-group inline block">
            <input readonly="readonly" type="text" id="pointer-url" placeholder="url">
            <button class="button outline icon" data-clipboard-target="#pointer-url" type="button" title="Copy Link"><svg class="svg-icon" data-icon="copy" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
</svg></button>
        </div>
            </div>
</div>    </main>

    <div id="sibling-navigation" class="grid half collapse-xs items-center mb-m px-m no-row-gap fade-in-when-active print-hidden">
    <div>
            </div>
    <div>
                    <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/chapter/content-examples" data-shortcut="next" class="outline-hover no-link-style block rounded text-xs-right">
                <div class="px-m pt-xs text-muted text-xs-right">Next</div>
                <div class="inline block">
                    <div class="icon-list-item no-hover">
                        <span class="text-chapter "><svg class="svg-icon" data-icon="chapter" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z"/>
</svg></span>
                        <span>Content Examples</span>
                    </div>
                </div>
            </a>
            </div>
</div>
                        <div class="px-xl">
                <hr class="darker">
            </div>
        
        <div class="px-xl comments-container mb-l print-hidden">
            <section component="page-comments"
         option:page-comments:page-id="1"
         option:page-comments:updated-text="Comment updated"
         option:page-comments:deleted-text="Comment deleted"
         option:page-comments:created-text="Comment added"
         option:page-comments:count-text="{0} No Comments|{1} 1 Comment|[2,*] :count Comments"
         class="comments-list"
         aria-label="Comments">

    <div refs="page-comments@commentCountBar" class="grid half left-focus v-center no-row-gap">
        <h5 comments-title>No Comments</h5>
            </div>

    <div refs="page-comments@commentContainer" class="comment-container">
            </div>

    
</section>            <div class="clearfix"></div>
        </div>
                </div>
        </div>

        <div class="tri-layout-right print-hidden">
            <aside class="tri-layout-right-contents">
                    <div id="page-details" class="entity-details mb-xl">
        <h5>Details</h5>
        <div class="blended-links">
            <div class="entity-meta">
    
            <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/revisions" class="entity-meta-item">
            <svg class="svg-icon" data-icon="history" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
</svg>Revision #3
        </a>
    
    
            <div class="entity-meta-item">
            <svg class="svg-icon" data-icon="star" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>            <div>
                Created <span title="Sun, Oct 17, 2021 10:56 AM">1 year ago</span> by <a href='https://demo.bookstackapp.com/user/barry-jenkins'>Barry Jenkins</a>
            </div>
        </div>
    
            <div class="entity-meta-item">
            <svg class="svg-icon" data-icon="edit" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg>            <div>
                Updated <span title="Tue, Nov 8, 2022 10:36 AM">3 months ago</span> by <a href='https://demo.bookstackapp.com/user/admin'>Admin</a>
            </div>
        </div>
    
    </div>
            
            
            
                    </div>
    </div>

    <div class="actions mb-xl">
        <h5>Actions</h5>

        <div class="icon-list text-link">

            
                                                <a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/revisions" data-shortcut="revisions" class="icon-list-item">
                <span><svg class="svg-icon" data-icon="history" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z"/>
</svg></span>
                <span>Revisions</span>
            </a>
                        
            <hr class="primary-background"/>

                                        <div component="dropdown"
     class="dropdown-container"
     id="export-menu">

    <div refs="dropdown@toggle"
         class="icon-list-item"
         aria-haspopup="true"
         aria-expanded="false"
         aria-label="Export"
         data-shortcut="export"
         tabindex="0">
        <span><svg class="svg-icon" data-icon="export" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
</svg></span>
        <span>Export</span>
    </div>

    <ul refs="dropdown@menu" class="wide dropdown-menu" role="menu">
        <li><a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/export/html" target="_blank" class="label-item"><span>Contained Web File</span><span>.html</span></a></li>
        <li><a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/export/pdf" target="_blank" class="label-item"><span>PDF File</span><span>.pdf</span></a></li>
        <li><a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/export/plaintext" target="_blank" class="label-item"><span>Plain Text File</span><span>.txt</span></a></li>
        <li><a href="https://demo.bookstackapp.com/books/bookstack-demo-site/page/logging-in-to-the-demo-site/export/markdown" target="_blank" class="label-item"><span>Markdown File</span><span>.md</span></a></li>
    </ul>

</div>
                    </div>

    </div>
            </aside>
        </div>
    </div>

    </div>

    
    <div component="back-to-top" class="back-to-top print-hidden">
        <div class="inner">
            <svg class="svg-icon" data-icon="chevron-up" role="presentation"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
    <path d="M0 0h24v24H0z" fill="none"/>
</svg> <span>Back to top</span>
        </div>
    </div>

        <script src="https://demo.bookstackapp.com/dist/app.js?version=v23.01.1" nonce="Zvm2dZAyeVGJtbNHgTl3cdku"></script>
    
    </body>
</html>
