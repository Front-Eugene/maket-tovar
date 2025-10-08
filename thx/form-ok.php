<!DOCTYPE html>
<html lang="ru">

<head>

  <meta charset="UTF-8">
  <title>Спасибо!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      color: #313E47;
      font-family: Arial;
      text-align: center;
      background: url(body.jpg) repeat;
      padding-top: 60px;
    }

    h2 {
      font-size: 36px;
      font-weight: 700;
      line-height: 44px;
      text-transform: uppercase;
    }

    h3 {
      color: #464646;
      font-size: 32px;
    }

    .success {
      font-size: 21px;
      line-height: 1.4em;
    }

    .shiny-button {
      display: inline-block;
      text-transform: uppercase;
      text-decoration: none;
      font-family: sans-serif;
      color: #FFFFFF;
      border-radius: 10px;
      padding: 15px 30px 12px 30px;
      background: #2774E9;
      letter-spacing: 1px;
      font-size: 16px;
    }

    .shiny-button:hover {
      background: #4790ff;
    }

    @media (max-width: 900px) {
      body {
        padding-top: 20px;
      }

      h2 {
        font-size: 23px;
        line-height: 33px;
      }

      .success {
        font-size: 17px;
        line-height: 1.5em;
      }

      h3 {
        font-size: 21px;
      }

    }

    @media screen and (min-width: 768px) {
      .rwd-break {
        display: none;
      }
    }
  </style>


</head>

<body>


  <div class="main">
    <img src="index.png">
    <h2>Спасибо!<br class="rwd-break"> Ваша заявка принята!</h2>
    <p class="success">В ближайшее время мы с Вами свяжемся. <br>Пожалуйста, включите ваш контактный телефон.</p>
    <!--<h3>Спасибо что выбрали нас!</h3>	-->
    <a href="" class="shiny-button" onclick="history.back();return false;"><strong>Вернуться на сайт</strong></a>
  </div>
  <footer id="foot" style="text-align: center">
  <center style="color: black">
            <p>
                ООО "СЕЙЛАП" УНП 193677300<br />
                220037, г.Минск, а/я 37<br />
                Телефон: <a href="tel:+375256545376">+375 (25) 654-53-76</a>
                <br />
                E-mail:
                <a href="mailto:seilup@mail.ru" target="_blank">
                    seilup@mail.ru</a
                >
            </p>
            <p style="text-align: center; padding-top: 15px">
                <a href="politics.html">Политика конфиденциальности</a>
                <br />
                <a href="dogovor_vozvrata.html">Условия возврата и обмена</a>
                <br />
                <a href="agreement.html">Пользовательское соглашение</a>
            </p>
        </center>
  </footer>


</body>

</html>