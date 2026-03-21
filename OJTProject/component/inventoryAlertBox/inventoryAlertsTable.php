<?php
// line 29 pababa, nandon yung mga na bago

?>
<table class="history-table" id="historyTable"> 
    <thead>
        <tr>
            <th style="text-align: center; width: 50px;">
                <input type="checkbox" id="selectAllAlerts" style="transform: scale(1.2); cursor: pointer;">
            </th>
            <th>Item Name</th>
            <th>Description</th> 
            <th>Cabinet</th>
            <th style="text-align: center;">Qty Left</th>
            <th style="text-align: center;">Min</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($pendingCount > 0): ?>
            <?php while($row = $alertResult->fetch_assoc()): 
                $isUrgent = ($row['quantity'] <= 0);
            ?>
                <tr class="low-stock-row <?= $isUrgent ? 'critical-row-urgent' : '' ?> reveal">
                    
                    <td class="checkbox-cell hide-on-mobile" data-label="Select"> 
                        <input type="checkbox" name="acknowledge_ids[]" value="<?= $row['id'] ?>" class="alert-checkbox" style="transform: scale(1.2); cursor: pointer;">
                    </td>

                    <td data-label="Item Name" style="font-weight: 600;">
                        <div class="mobile-item-wrapper"> 
                            <span class="alert-dot"></span>
                            <?= htmlspecialchars($row['item']) ?>
                            <?php if($isUrgent): ?>
                                <br class="mobile-only"> <span class="urgent-badge">OUT OF STOCK</span>
                            <?php endif; ?>
                        </div>
                    </td>

                    <td data-label="Description" class="desc-cell">
                        <?= htmlspecialchars($row['description']) ?>
                    </td>

                    <td data-label="Cabinet">
                        <span class="cabinet-tag">
                            <?= htmlspecialchars($row['cabinet']) ?>
                        </span>
                    </td>

                    <td data-label="Qty Left" class="critical-text" style="text-align: center;">
                        <strong><?= $row['quantity'] ?></strong>
                    </td>

                    <td data-label="Min Level" class="min-qty-cell" style="text-align: center;">
                        <?= $row['min_quantity'] ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="empty-alert"> 
                    <div style="margin: 30px 0; text-align: center;">
                        <span class="material-symbols-outlined" style="font-size: 3.5rem; color: #28a745; display: block; margin-bottom: 10px;">check_circle</span>
                        <p style="font-weight: 600; color: #2d3748;">All stock levels are optimal.</p>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>