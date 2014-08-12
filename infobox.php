<?php

// Copyright (c) 2014, Daiki Umeda (XJINE) - lightweightmarkuplanguage.com
// All rights reserved.
// 
// Redistribution and use in source and binary forms, with or without
// modification, are permitted provided that the following conditions are met:
// 
// * Redistributions of source code must retain the above copyright notice, this
//   list of conditions and the following disclaimer.
// 
// * Redistributions in binary form must reproduce the above copyright notice,
//   this list of conditions and the following disclaimer in the documentation
//   and/or other materials provided with the distribution.
// 
// * Neither the name of the copyright holder nor the names of its
//   contributors may be used to endorse or promote products derived from
//   this software without specific prior written permission.
// 
// THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
// AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
// IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
// DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
// FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
// DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
// SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
// CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
// OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
// OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

// = How to Use.
// 
// Put infobox's css set into your directory, 
// and write like following example.
// (valid options : note, help, caution, warning, download)
// 
// [[infobox::
// Plain style text.
// ]]
//
// [[infobox::note::
// note style text.
// ]]

class InfoBox
{
    public static function convert($markedupText, $options)
    {
        $result = "<div class=\"infobox";
        $className = "";
        
        if(count($options) >= 1)
        {
            $className = strtolower($options[0]);
        }

        switch ($className)
        {
            case "note":
            {
                $result = $result . " infobox_note\">";
                break;
            }
            case "help":
            {
                $result = $result . " infobox_help\">";
                break;
            }
            case "caution":
            {
                $result = $result . " infobox_caution\">";
                break;
            }
            case "warning":
            {
                $result = $result . " infobox_warning\">";
                break;
            }
            case "download":
            {
                $result = $result . " infobox_download\">";
                break;
            }
            default:
            {
                $result = $result . " infobox_plain\">";
                break;
            }
        }

        return $result . "<div class=\"infobox_contents\">" . KARAS\KARAS::convert($markedupText) . "</div></div>";
    }
}

?>