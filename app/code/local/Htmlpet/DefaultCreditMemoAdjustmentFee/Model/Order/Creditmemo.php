<?php

class Htmlpet_DefaultCreditMemoAdjustmentFee_Model_Order_Creditmemo extends Mage_Sales_Model_Order_Creditmemo
{
	const XML_PATH_DEFAULT_ADJUSTMENT_FEE = 'sales/general/default_adjustment_fee';

	/**
	 * Overrides the default getBaseAdjustmentFeeNegative by setting a default one if such is missing
	 *
	 * @return int
	 */
	public function getBaseAdjustmentFeeNegative()
	{

		$defaultAdjustmentFee = (int)Mage::getStoreConfig(self::XML_PATH_DEFAULT_ADJUSTMENT_FEE);
		$baseAdjustmentFeeNegative = parent::getBaseAdjustmentFeeNegative();

		// Do not alter the adjustment fee if it is a negative value
		if ($defaultAdjustmentFee < 0) {
			return $baseAdjustmentFeeNegative;
		}

		if ($baseAdjustmentFeeNegative === null) {
			$baseAdjustmentFeeNegative = $defaultAdjustmentFee;
		}

		return $baseAdjustmentFeeNegative;
	}
}