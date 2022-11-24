<?php

/**
 * Binary Tree
 *
 * A binary tree consists a set of tree nodes from root. Each tree node has a
 * value (primitive or object) and, optionally, a left and a right branch.
 *
 * @package algo-platter
 * @version 1.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 * @todo    - ADD: dump entire tree
 *          - fix traversal output
 */
Class BinaryTree {

    public $root;

    public function __construct()
    {
        $child3 = new TreeNode(77);
        $child4 = new TreeNode(23);

        $child1 = new TreeNode(43, $child3);
        $child2 = new TreeNode(12, null, $child4);

        $this->root = new TreeNode(32, $child1, $child2);
    }

    /**
     * Dump Node
     *
     * Outputs a single tree node
     *
     * @param   TreeNode  $node       a tree node
     * @return  void
     */
    public function dumpNode(TreeNode &$node) : void {

        echo "\t  ".$node->value."\n";
        echo "\t  /\\\t\n";
        if (is_null($node->leftBranch) && is_null($node->rightBranch))
            echo "\t X X\t";
        elseif (is_null($node->leftBranch))
            echo "\tX ".$node->rightBranch->value."\t";
        elseif (is_null($node->rightBranch))
            echo "\t".$node->leftBranch->value." X";
        else
            echo "\t ".$node->leftBranch->value." ".$node->rightBranch->value."\t";

        echo "\n";
    }

    /**
     * Dump Node
     *
     * Outputs the entire tree
     *
     * @return  void
     */
    public function dumpTree() : void {


    }

    /**
     * Traverse
     *
     * Traverses the tree starting from the given node and outputs the value of each node
     * The given node could be root, which is the top-most tree node.
     *
     * @return  void
     * @space
     * @time
     */
    public function traverse(TreeNode &$node)
    {

        if (is_null($node->leftBranch) && is_null($node->rightBranch)) {
            echo "\t".$node->value." => X X\t";
            return;
        }
        if (is_null($node->leftBranch)) {
            echo "\t".$node->value."=> X \t".$this->traverse($node->rightBranch)."\t";
            return;
        }
        if (is_null($node->rightBranch)) {
            echo "\t  ".$node->value."\n";
            echo $this->traverse($node->leftBranch)."\t X";
            return;
        }
        else {
            echo "\t ".$node->value."\n";
            return "\t ".$this->traverse($node->leftBranch)." ".$this->traverse($node->rightBranch)."\t ";
        }
    }

}

/**
 * Tree Node
 *
 * A tree node consists of a value, any primitive or object, and a left and right branch.
 *
 * @package algo-platter
 * @version 1.0
 * @access  public
 * @see     http://git@github.com/github-34/algo-platter
 */
class TreeNode {
    public $value;
    public $leftBranch;
    public $rightBranch;

    public function __construct($value, $leftBranch = null, $rightBranch = null) {
        $this->value = $value;
        $this->leftBranch = $leftBranch;
        $this->rightBranch = $rightBranch;
    }
}

$tree = new BinaryTree();
$tree->dumpNode($tree->root);
$tree->dumpNode($tree->root->leftBranch);
$tree->dumpNode($tree->root->rightBranch);
$tree->traverse($tree->root);


?>