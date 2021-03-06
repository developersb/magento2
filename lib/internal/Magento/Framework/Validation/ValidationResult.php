<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Validation;

/**
 * ValidationResult object supposed to be created by dedicated validator service which makes a validation and checks
 * whether all entity invariants (business rules that always should be fulfilled) are valid.
 *
 * ValidationResult represents a container storing all the validation errors that happened during the entity validation.
 *
 * @api
 */
class ValidationResult
{
    /**
     * @var array
     */
    private $errors = [];

    /**
     * @param array $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
<<<<<<< HEAD
     * Check error existence. If any return boolean true else false.
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @return bool
     */
    public function isValid(): bool
    {
        return empty($this->errors);
    }

    /**
<<<<<<< HEAD
     * Return list of errors.
     *
=======
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
