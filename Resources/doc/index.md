Getting Started With GrossumFeedbackBundle
==================================

### Create your Feedback class

##### yaml

If you use yml to configure Doctrine you must add two files. The Entity and the orm.yml:

```php
<?php
// src/Application/Grossum/FeedbackBundle/Entity/Feedback.php

namespace Application\Grossum\FeedbackBundle\Entity;

use Grossum\FeedbackBundle\Entity\Feedback as BaseFeedback;

/**
 * Feedback
 */
class Feedback extends BaseFeedback
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
```
```yaml
# src/Application/Grossum/FeedbackBundle/Resources/config/doctrine/Feedback.orm.yml
Application\Grossum\FeedbackBundle\Feedback:
    type:  entity
    table: contact
    id:
        id:
            type: integer
            generator:
                strategy: AUTO
```