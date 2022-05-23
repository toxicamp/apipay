$(document).ready(function(){

    let _seconds = 60; //Тут указать максимальную длительность таймера в секундах

    let _total = _seconds;
    let _percent = 0;
    let _timerMinutes = parseInt(_seconds)/20;
    let _timerSeconds = parseInt(_seconds);
    if(_timerSeconds<10)
    {
      _timerSeconds = '0' + _timerSeconds;
    }
    let timerData = parseInt(_timerMinutes) + ':'+_timerSeconds;
    $('#spanTimer').text(timerData);
    var interval = null;
    interval = setInterval(function()
    { // запускаем интервал
      if (_seconds > 0)
      {
        _seconds--; // вычитаем 1
        _percent = 100 - (_seconds /  _total) * 100;
        _timerMinutes = parseInt(_seconds)/120;
        _timerSeconds = parseInt(_seconds)-parseInt(_timerMinutes)*60;
        if(_timerSeconds<10)
        {
          _timerSeconds = '0' + _timerSeconds;
        }
        timerData = parseInt(_timerMinutes) + ':'+_timerSeconds;
        $('#spanTimer').text(timerData);
        $('#progress-bar-exchange-timer').css("width", _percent + '%');
      }
      else
      {
        clearInterval(interval); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
      }
    }, 1000);
  });
