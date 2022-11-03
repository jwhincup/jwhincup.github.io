<?php
/**
 * WooCommerce Square
 *
 * This source file is subject to the GNU General Public License v3.0
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@woocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade WooCommerce Square to newer
 * versions in the future. If you wish to customize WooCommerce Square for your
 * needs please refer to https://docs.woocommerce.com/document/woocommerce-square/
 *
 * @author    WooCommerce
 * @copyright Copyright: (c) 2019, Automattic, Inc.
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License v3.0
 */

namespace WooCommerce\Square\API\Responses;

use Square\Models\BatchRetrieveInventoryCountsResponse;
use WooCommerce\Square\API\Response;

defined( 'ABSPATH' ) || exit;

/**
 * Inventory response object
 *
 * @since 2.0.0
 */
class Inventory extends Response {


	/**
	 * Gets inventory counts.
	 *
	 * @since 2.0.0
	 *
	 * @return \Square\Models\InventoryCount[] array of inventory count objects
	 */
	public function get_counts() {

		$counts = array();

		if ( $this->get_data() instanceof BatchRetrieveInventoryCountsResponse && is_array( $this->get_data()->getCounts() ) ) {
			$counts = $this->get_data()->getCounts();
		}

		return $counts;
	}


	/**
	 * Checks if there are inventory counts.
	 *
	 * @since 2.0.0
	 *
	 * @return bool
	 */
	public function has_counts() {

		return ! empty( $this->get_counts() );
	}


}
