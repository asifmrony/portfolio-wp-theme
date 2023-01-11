<?php get_header(); 

/* 
* Template name: Coming soon
* Purpose: to be used before site launch, during Maintainance.
* Creation of Rony for his portfolio website 
*/

?>

<main>
      <article class="coming-soon">
        <div class="coming-soon__header">
          <svg width="76" height="19">
            <use xlink:href="#logo"></use>
          </svg>
        </div>
        <div class="container coming-soon__container">
          <div class="coming-soon__wrapper">
            <div class="coming-soon__content">
              <div class="coming-soon__title">Comming soon...</div>
              <div class="coming-soon__subtitle">
                Condimentum ipsum a adipiscing hac dolor set consectetur urna commodo elit parturient a molestie ut nisl partu convallier ullamcorpe.</div>
              <div class="coming-soon__timer-title">Our website will be launched in:</div>
              <!-- Timer-->
              <div class="timer" data-time-out="2020-12-23T00:00:00">
                <div class="timer__digit">
                  <p class="js-stock-countdown-d">02</p>
                  <span>Days</span>
                </div>
                <div class="timer__digit">
                  <p class="js-stock-countdown-h">12</p>
                  <span>Hours</span>
                </div>
                <div class="timer__digit">
                  <p class="js-stock-countdown-m">07</p>
                  <span>Minutes</span>
                </div>
                <div class="timer__digit">
                  <p class="js-stock-countdown-s">34</p>
                  <span>Seconds</span>
                </div>
              </div>
              <!-- Social-->
              <ul class="social coming-soon__social">
                <li class="social__item">
                  <a class="social__link" href="#" target="_blank">
                    <svg width="22" height="22">
                      <use xlink:href="#soc-fb"></use>
                    </svg>
                  </a>
                </li>
                <li class="social__item">
                  <a class="social__link" href="#" target="_blank">
                    <svg width="22" height="22">
                      <use xlink:href="#soc-tw"></use>
                    </svg>
                  </a>
                </li>
                <li class="social__item">
                  <a class="social__link" href="#" target="_blank">
                    <svg width="22" height="22">
                      <use xlink:href="#soc-gp"></use>
                    </svg>
                  </a>
                </li>
                <li class="social__item">
                  <a class="social__link" href="#" target="_blank">
                    <svg width="22" height="22">
                      <use xlink:href="#soc-lin"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </article>
    </main>
</div>
</div>    

<?php get_footer(); ?>
