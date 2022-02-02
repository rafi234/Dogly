<?php

echo ' 
        <button class="mobile-nav-toggle" aria-controls="navigation-list" aria-expanded="false">
            <i class="fas fa-bars"></i>
            <span class="sr-only">Menu</span>
        </button>
        <nav id="navigation-list" data-visible="false">
        <a href="http://localhost:8080/mainPage">
            <img src="public/img/logo.svg" alt="Dogly logo">
        </a>
        
        <ul >
            <li>
                <i class="fas fa-user"></i>
                <a href="#" class="button">People</a>
            </li>
            <li>
                <i class="fas fa-walking"></i>
                <a href="http://localhost:8080/walkPage" class="button">Walk</a>
            </li>
            <li>
                <i class="fas fa-paw"></i>
                <a href="#" class="button">Long-term care</a>
            </li>
            <li>
                <i class="fab fa-meetup"></i>
                <a href="http://localhost:8080/meetings" class="button" id="meetings">Dog meetings</a>
            </li>
            <li>
                <i class="fas fa-bell"></i>
                <a href="#" class="button">Notification</a>
            </li>
            <li>
                <i class="fas fa-cog"></i>
                <a href="#" class="button">Settings</a>
            </li>
        </ul>
    </nav>'
;