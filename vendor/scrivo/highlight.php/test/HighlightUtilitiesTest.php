<?php

/* Copyright (c) 2019 Geert Bergman (geert@scrivo.nl), highlight.php
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 * 3. Neither the name of "highlight.js", "highlight.php", nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

class HighlightUtilitiesTest extends PHPUnit_Framework_TestCase
{
    /** @var \Highlight\Highlighter */
    private $hl;

    protected function setUp()
    {
        $this->hl = new \Highlight\Highlighter();
    }

    public function testSplitCodeIntoArray_MultilineComment()
    {
        $raw = <<<PHP
/**
 * Hello World
 *
 * @api
 * @since 1.0.0
 * @param string \$str Some string parameter
 */
PHP;
        $highlighted = $this->hl->highlight('php', $raw);

        $cleanSplit = \HighlightUtilities\splitCodeIntoArray($highlighted->value);
        $dumbSplit = preg_split('/\R/', $highlighted->value);

        $this->assertEquals(1, substr_count($highlighted->value, 'hljs-comment'));
        $this->assertEquals(count($cleanSplit), substr_count(implode(PHP_EOL, $cleanSplit), 'hljs-comment'));

        $this->assertTrue(is_array($cleanSplit));
        $this->assertCount(count($dumbSplit), $cleanSplit);
        $this->assertNotEquals($cleanSplit, $dumbSplit);

        foreach ($cleanSplit as $line) {
            $this->assertStringStartsWith('<span class="hljs-comment">', trim($line));
            $this->assertStringEndsWith('</span>', trim($line));
        }
    }
}
