<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;

    }

    /* Progressbar container */
    #progressbar {
        display: flex;
        padding: 0;
        list-style: none;
        counter-reset: step;
        margin-bottom: 30px;
        width: 100%;
    }

    /* Progress bar steps */
    #progressbar li {
        text-align: center;
        position: relative;
        flex-grow: 1;
        color: #912087;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
    }

    #progressbar li::before {
        content: counter(step);
        counter-increment: step;
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: block;
        background: #e0e0e0;
        border-radius: 50%;
        margin: 0 auto 10px auto;
    }

    #progressbar li.active::before {
        background: #a634db;
        color: white;
    }

    /* Line connector between steps */
    #progressbar li::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        background: #711588;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    /* Remove line on the first step */
    #progressbar li:first-child::after {
        content: none;
    }

    #progressbar li.active::after {
        background: #a634db;
    }

    /* Progressbar styles */
    #progressbar li.active {
        color: #a634db;
    }

</style>


    <a href="{{route('account.logout')}}" class="nav-link"><i class="ri-logout-box-r-line"></i> <span>Logout</span></a>