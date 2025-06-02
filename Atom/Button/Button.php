<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Nsw\Atom\Button;

use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Common\Atom\Button\ButtonType;
use PreviousNext\Ds\Nsw\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Scenarios([CommonAtom\Button\ButtonScenarios::class])]
class Button extends CommonAtom\Button\Button implements Utility\NswObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    {
    $as = \strtolower(match ($this->as) {
      // Define all cases so we are notified by PHPStan if a new one is added
      // upstream.
      ButtonType::Button, ButtonType::Input, ButtonType::Link => $this->as->name,
    });

    return parent::build($build)
      ->set('title', $this->title)
      ->set('href', $this->href)
      ->set('as', $as);
    }
  }

}
