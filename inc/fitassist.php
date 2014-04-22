<?php
/**
 *
 */

// the iCal date format. Note the Z on the end indicates a UTC timestamp.
define('ICAL_DATE_FORMAT', 'Ymd\THis\Z');

class FitAssist {

  private $header;
  private $prodid;
  private $version = "2.0";
  public $output;
  public $events;
  public $challenge;
  public $commencing;

  public $days = 29;
  public $dates = array();

  public function __construct($challenge = 'abandsquats', $commencing = 0) {
    $this->challenge = $challenge;
    $this->commencing= $commencing;

    $this->setProdId();
    $this->getEventDays();
    $this->getEvents();
    $this->render();

  }

  private function setProdId() {
    $this->prodid = "-//Ashley Lawrence//FitAssist//EN\n";
  }

  protected function getEvents() {
    foreach ($this->dates as $day => $date) {
      switch ($this->challenge) {
        case 'plank':
          $this->events[] = new FitAssistPlank($this->dates[$day], $day);
          break;
        case 'abandsquats':
          $this->events[] = new FitAssistAbAndSquats($this->dates[$day], $day);
          break;
      }
    }
  }

  /**
   * sets up an array of 30 days starting today
   */
  protected function getEventDays() {

    for ($i = 0; $i <= $this->days; $i++) {
      $this->dates[$i] = date(ICAL_DATE_FORMAT, mktime(7, 30, 0, date("m"), date("d") + $i, date("Y")));
    }
  }

  protected function beginCalendar() {
    $this->output .= "BEGIN:VCALENDAR\n";
    $this->output .= "METHOD:PUBLISH\n";
    $this->output .= "VERSION:" . $this->version . "\n";
    $this->output .= "PRODID:" . $this->prodid;
  }

  protected function beginEvents() {
    return "BEGIN:VEVENT\n";
  }

  protected function endEvents() {
    return "\nEND:VEVENT\n";
  }

  protected function endCalendar() {
    $this->output .= "END:VCALENDAR";
  }

  protected function setHeader() {
    header('Content-type: text/calendar; charset=utf-8');
    header('Content-Disposition: inline; filename=calendar.ics');
  }

  protected function render() {

    $this->beginCalendar();
    if (is_array($this->events)) {
      foreach ($this->events as $event) {
        $this->output .= $this->beginEvents();
        $this->output .= "SUMMARY:" . $event->title;
        $this->output .= "\nDESCRIPTION:" . $event->desc;
        $this->output .= "\nUID:" . $event->uuid;
        $this->output .= "\nSTATUS:" . $event->status;
        $this->output .= "\nDTSTART:" . $event->start_date_time;;
        $this->output .= "\nDTEND:" . $event->end_date_time;
        $this->output .= $this->endEvents();
      }
    }

    $this->endCalendar();
    $this->setHeader();
    echo $this->output;
    exit;
  }
}


class FitAssistEvent {

  public $desc;
  public $descriptions;
  public $start_date_time;
  public $end_date_time;
  public $status = "CONFIRMED";
  public $uuid;
  public $changed;

  public function __construct($date, $day) {
    $this->getDescriptions();
    if (!$this->descriptions) {
      throw new \Exception('No descriptions');
    }

    $this->desc = $this->descriptions[$day];
    $this->start_date_time = $date;
    $this->end_date_time = $date;
    $this->uuid = \uniqid();

  }
}

class FitAssistPlank extends FitAssistEvent {

  public $title = "30 Day Plank Challenge";


  public function getDescriptions() {
    $this->descriptions = array(
      '20 seconds',
      '20 seconds',
      '30 seconds',
      '30 seconds',
      '40 seconds',
      'Take a break its a rest day',
      '45 seconds',
      '45 seconds',
      '60 seconds',
      '60 seconds',
      '60 seconds',
      '90 seconds',
      'You are doing Awesome, have a rest today',
      '90 seconds',
      '90 seconds',
      '120 seconds',
      '120 seconds',
      '150 seconds',
      'Do you know you have done over half the month take a break today its a rest day',
      '150 seconds',
      '150 seconds',
      '180 seconds',
      '180 seconds',
      '210 seconds',
      '210 seconds',
      'Last rest day, final stretch starts tomorrow',
      '240 seconds',
      '240 seconds',
      '270 seconds',
      '300 seconds',
    );
  }
}


class FitAssistAbAndSquats extends FitAssistEvent {

  public $title = "30 Day Ab & Squat Challenge";


  public function getDescriptions() {
    $this->descriptions = array(
      '10 Sit ups / 10 Crunches / 25 Squats',
      '20 Sit ups / 15 Crunches / 30 Squats',
      '5 Sit ups / 20 Crunches / 35 Squats',
      '10 Sit ups / 25 Crunches / 40 Squats',
      '5 Sit ups / 10 Crunches / 20 Squats',
      '15 Sit ups / 30 Crunches / 50 Squats',
      '20 Sit ups / 35 Crunches / 55 Squats',
      '30 Sit ups / 40 Crunches / 60 Squats',
      'Take a break its a rest day',
      '10 Sit ups / 10 Crunches / 25 Squats',
      '40 Sit ups / 50 Crunches / 65 Squats',
      '45 Sit ups / 60 Crunches / 70 Squats',
      '5 Sit ups / 5 Crunches / 5 Squats',
      '10 Sit ups / 10 Crunches / 10 Squats',
      '20 Sit ups / 30 Crunches / 20 Squats',
      '25 Sit ups / 30 Crunches / 45 Squats',
      '40 Sit ups / 50 Crunches / 60 Squats',
      'You are doing Awesome, have a rest today',
      '5 Sit ups / 5 Crunches / 5 Squats',
      '10 Sit ups / 10 Crunches / 25 Squats',
      '20 Sit ups / 15 Crunches / 35 Squats',
      '20 Sit ups / 25 Crunches / 45 Squats',
      '10 Sit ups / 40 Crunches / 55 Squats',
      '10 Sit ups / 50 Crunches / 65 Squats',
      '15 Sit ups / 60 Crunches / 65 Squats',
      '20 Sit ups / 70 Crunches / 85 Squats',
      'Couple more days and you are done today is a rest day',
      '25 Sit ups / 80 Crunches / 95 Squats',
      '30 Sit ups / 90 Crunches / 95 Squats',
      '40 Sit ups / 100 Crunches / 100 Squats',

    );
  }
}



//$cal = new GenerateCal();
