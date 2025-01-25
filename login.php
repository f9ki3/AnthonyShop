<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="app.js" defer></script>
    <title>Sidebar</title>
</head>
<body>
    <!--Sidebar-->
    <nav id="sidebar">
        <ul>
            <li>
                <img src="img/logo.png">
                <button onclick=toggleSidebar() id="toggle-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
                </button>
            </li>

            <li>
                <a href="#.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                <span>Profile</span>
                </a>
            </li>


            <li>
                <button onclick=toggleSubMenu(this) class="dropdown-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M560-320h80v-80h80v-80h-80v-80h-80v80h-80v80h80v80ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg>
                    <span>Products</span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                </button>
                <ul class="sub-menu show">
                    <div>
                        <li><a href="#">Frozen Food</a></li>
                        <li><a href="#">Chicken</a></li>
                        <li><a href="#">Grocery</a></li>
                    </div>
                </ul>
            </li>


            <li>
                <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z"/></svg>
                <span>Cart</span>
                </a>
            </li>

            <li>
                <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                <span>My Orders</span>
                </a>
            </li>
        </ul>
    </nav>
    
    <!--Content-->
    <main>
        <div class="container">
            <h2>Hello World</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora iure ad eaque aliquid dolorem obcaecati repudiandae facilis sapiente placeat eveniet!</p>
        </div>
        <div class="container">
            <h2>Example Heading</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora iure ad eaque aliquid dolorem obcaecati repudiandae facilis sapiente placeat eveniet!</p>
        </div>
        <div class="container">
            <h2>Lorem Ipsum</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora iure ad eaque aliquid dolorem obcaecati repudiandae facilis sapiente placeat eveniet!</p>
        </div>
    </main>

<style>@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
:root{
    --base-clr: rgb(255, 246, 246);
    --line-clr: #42434a;
    --hover-clr: #222533;
    --text-clr: #e6e6ef;
    --accent-clr: #5e63ff;
    --secondary-text-clr: #b0b3c1;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    min-height: 100vh;
    min-height: 100dvh;
    background-color: var(--base-clr);
    color: var(--text-clr);
    display: grid;
    grid-template-columns: auto 1fr;
}
/* Sidebar*/

/* Image*/
#sidebar img{
height: 80px;
width: 100px;
margin-left: 50px;
}

#sidebar{
    box-sizing: border-box;
    height: 100vh;
    width: 250px;
    padding: 5px 1em;
    background-color: #494646;
    border-right: 1px solid var(--line-clr);

    position: sticky;
    top: 0;
    align-items: start;
    transition: 300ms ease-in-out;
    overflow: hidden;
    text-wrap: nowrap;
}
#sidebar.close{
    padding: 5px;
    width: 59px;
}
#sidebar ul{
    list-style: none;
}

#sidebar > ul > li:first-child{
    display: flex;
    justify-content: flex-end;
    margin-bottom: 16px;
    .logo{
        font-weight: 600;
    }
}

#sidebar ul li.active a{
    color: var(--accent-clr);

    svg{
        fill: var(--accent-clr);
    }
}

#sidebar a, #sidebar .dropdown-btn, #sidebar .logo{
    border-radius: .5em;
    padding: .85em;
    text-decoration: none;
    color: var(--text-clr);
    display: flex;
    align-items: center;
    gap: 1em;
}
.dropdown-btn{
    width: 100%;
    text-align: left;
    background: none;
    border: none;
    font: inherit;
    cursor: pointer;
}
#sidebar svg{
    flex-shrink: 0;
    fill: var(--text-clr);
}
#sidebar a span, #sidebar .dropdown-btn span{
    flex-grow: 1;
}
#sidebar a:hover, #sidebar .dropdown-btn:hover{
    background-color: var(--hover-clr);
}
#sidebar .sub-menu{
    display: grid;
    grid-template-rows: 0fr;
    transition: 300ms ease-in-out;

    > div{
        overflow: hidden;
    }
}
#sidebar .sub-menu.show{
    grid-template-rows: 1fr;
}
.dropdown-btn svg{
    transition: 200ms ease;
}
.rotate svg:last-child{
    rotate: 180deg;
}
#sidebar .sub-menu{
    padding-left: 2em;
}
#toggle-btn{
    margin-left: auto;
    padding: 1em;
    border: none;
    border-radius: .5em;
    background: none;
    cursor: pointer;

    svg{
        transition: rotate 150ms ease;
    }
}
#toggle-btn:hover{
    background-color: var(--hover-clr);
}



/* Content*/
main{
    padding: min(30px, 7%);
}
main p{
    color: var(--secondary-text-clr);
    margin-top: 5px;
    margin-bottom: 15px;
}
.container{
    border: 1px solid var(--line-clr);
    margin-top: 1em;
    margin-bottom: 20px;
    padding: min(3em, 15%);

    h2, p { margin-top: 1em;}
}

@media(max-width: 800px){
    body{
        grid-template-columns: 1fr;
    }
    main{
        padding: 2em 1em 60px 1em;
    }
    .container{
        border: none;
        padding-bottom: 0;
    }
    #sidebar{
        height: 60px;
        width: 100%;
        border-right: none;
        border-top: 1px solid var(--line-clr);
        padding: 0;
        position: fixed;
        top: unset;
        bottom: 0;

        >ul{
            padding: 0;
            display: grid;
            grid-auto-columns: 60px;
            grid-auto-flow: column;
            align-items: center;
            overflow-x: scroll;
        }
        ul li{
            height: 100%;
        }
        ul a, ul .dropdown-btn{
            width: 60px;
            height: 60px;
            padding: 0;
            border-radius: 0;
            justify-content: center;
        }
        
        ul li span, ul li:first-child, .dropdown-btn svg:last-child{
            display: none;
        }
        ul li .sub-menu.show{
            position: fixed;
        }
    }
}
</style>

<script>
const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')

function toggleSidebar(){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')

    Array.from(sidebar.getElementsByClassName('show')).forEach (ul =>{
        ul.classList.remove('show')
        ul.previousElementSibling.classList.remove('rotate')
    })
}

function toggleSubMenu(button){
    button.nextElementSibling.classList.toggle('show')
    button.classList.toggle('rotate')
    
    if(sidebar.classList.contains('close')){
        sidebar.classList.toggle('close')
        toggleButton.classList.toggle('rotate')
    }
}
</script>
    
</body>
</html>