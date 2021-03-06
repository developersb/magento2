<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Braintree\Gateway\Validator;

use Braintree\Result\Error;
use Braintree\Result\Successful;
use Magento\Payment\Gateway\Validator\AbstractValidator;
use Magento\Braintree\Gateway\SubjectReader;
use Magento\Payment\Gateway\Validator\ResultInterfaceFactory;

class GeneralResponseValidator extends AbstractValidator
{
    /**
     * @var SubjectReader
     */
    protected $subjectReader;

    /**
<<<<<<< HEAD
     * @var ErrorCodeValidator
     */
    private $errorCodeValidator;
=======
     * @var ErrorCodeProvider
     */
    private $errorCodeProvider;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3

    /**
     * Constructor
     *
     * @param ResultInterfaceFactory $resultFactory
     * @param SubjectReader $subjectReader
<<<<<<< HEAD
     * @param ErrorCodeValidator $errorCodeValidator
=======
     * @param ErrorCodeProvider $errorCodeProvider
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
     */
    public function __construct(
        ResultInterfaceFactory $resultFactory,
        SubjectReader $subjectReader,
<<<<<<< HEAD
        ErrorCodeValidator $errorCodeValidator
    ) {
        parent::__construct($resultFactory);
        $this->subjectReader = $subjectReader;
        $this->errorCodeValidator = $errorCodeValidator;
=======
        ErrorCodeProvider $errorCodeProvider
    ) {
        parent::__construct($resultFactory);
        $this->subjectReader = $subjectReader;
        $this->errorCodeProvider = $errorCodeProvider;
>>>>>>> 35c4f041925843d91a58c1d4eec651f3013118d3
    }

    /**
     * @inheritdoc
     */
    public function validate(array $validationSubject)
    {
        /** @var Successful|Error $response */
        $response = $this->subjectReader->readResponseObject($validationSubject);

        $isValid = true;
        $errorMessages = [];

        foreach ($this->getResponseValidators() as $validator) {
            $validationResult = $validator($response);

            if (!$validationResult[0]) {
                $isValid = $validationResult[0];
                $errorMessages = array_merge($errorMessages, $validationResult[1]);
            }
        }
        $errorCodes = $this->errorCodeProvider->getErrorCodes($response);

        return $this->createResult($isValid, $errorMessages, $errorCodes);
    }

    /**
     * @return array
     */
    protected function getResponseValidators()
    {
        return [
            function ($response) {
                return [
                    property_exists($response, 'success') && $response->success === true,
                    [$response->message ?? __('Braintree error response.')]
                ];
            },
            $this->errorCodeValidator
        ];
    }
}
