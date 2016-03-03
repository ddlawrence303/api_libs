
<?php
/* Managing products via code */

$this = $boostrap->run($app); // activate the magento app object 

// get catalog config infos
$catalogConfig = $this->_objectManager->create('Magento\Catalog\Model\Config');

//attribute id
$attributeSetId = $catalogConfig->getAttributeSetId(4, 'Default');

$product = $this->_objectManager->create('Magento\Catalog\Model\Product');

//setting product infos
$product->setTypeId(\Magento\Catalog\Model\Product\TYPE::TYPE_SIMPLE) /* product type */
		->setAttributeSetId($attributeSetId) /* attribute id */
		->setWebsiteIds([$this->storeManager->getWEbsite()->getId()]) /* website id */
		->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED)  /*  product status */
		->setStockData(['is_in_stock' => 1, 'manage_stock' => 0])  /* online product */
		->setStoreId(\Magento\Store\Model\Store::DEFAULT_STORE_ID)
		->setVisibility(Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH); /* for search , catalog page */

//setting product name and sku
$product->setName('Test API') /* product name */
		->setSku('test-api') /* product sku */
		->setPrice(100); /* product price */

$product->save(); /* product object saving */


// ================================================================================== //

/* Managing products via API */
curl -X POST "http://{$developing_url}/index.php/rest/V1/products" \  /* restful api :: post method*/
	 -H "Content-Type:application/json" \  /* set header infos */
	 -H "Authorization: Bearer {$authorization_encoding_code_number}" /* authorization bearer code number */
	 -d '{"product": {"sku":"test-api-1", "name": "Test API #1", "attribute_set_id": 4
	 	  "price": 100, "status": 1, "visibility": 4, "type_id": "simple", "weight": 1}}'

?>
