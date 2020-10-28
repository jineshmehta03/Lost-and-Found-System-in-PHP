<?php


class Categories extends DB
{
    public $response;
	function __construct()
    {
        parent::__construct( $this->host, $this->usernme, $this->password, $this->database );
    }
    
    function getCategoryName( $parent_id )
    {
        if( $parent_id != -1 )
        {
            $this->response = $this->getRow( 'categories', ' WHERE id = ' .  $parent_id );
            return $this->response['name'];
        }else{
            return "--";
        }
    }
    
    function getCategories()
    {
        $this->response = $this->getRows( 'categories' );
        if( $this->response != 0 )
        {
            ob_start();
            ?>
            <select name="category" class="form-control">
                <option value="0">Select Category</option>
                <?php
                foreach( $this->response as $cat )
                {
                    ?>
                    <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                    <?php
                }
                ?>    
            </select>
            <?php
            $select = ob_get_clean();
            return $select;
        }
    }
    
    function getParentCategories()
    {
        $this->response = $this->getRows( 'categories' );
        if( $this->response != 0 )
        {
            ob_start();
            ?>
            <select name="parent" class="form-control">
                <option value="0">Select Category</option>
                <?php
                foreach( $this->response as $cat )
                {
                    ?>
                    <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                    <?php
                }
                ?>    
            </select>
            <?php
            $select = ob_get_clean();
            return $select;
        }
    }
    
    function getChildCategories()
    {
        $this->response = $this->getRows( 'categories', "ASC", "" );
        if( $this->response != 0 )
        {
            ob_start();
            ?>
            <select name="parent" class="form-control">
                <option value="0">Select Category</option>
                <?php
                foreach( $this->response as $cat )
                {
                    ?>
                    <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                    <?php
                }
                ?>    
            </select>
            <?php
            $select = ob_get_clean();
            return $select;
        }
    }
}

$catObj = new Categories();