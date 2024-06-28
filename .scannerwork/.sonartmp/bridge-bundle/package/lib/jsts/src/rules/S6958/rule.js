"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.rule = void 0;
/*
 * SonarQube JavaScript Plugin
 * Copyright (C) 2011-2024 SonarSource SA
 * mailto:info AT sonarsource DOT com
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
const utils_1 = require("@typescript-eslint/utils");
const NODES = new Set([
    utils_1.TSESTree.AST_NODE_TYPES.ArrayExpression,
    utils_1.TSESTree.AST_NODE_TYPES.ClassExpression,
    utils_1.TSESTree.AST_NODE_TYPES.ObjectExpression,
    utils_1.TSESTree.AST_NODE_TYPES.Literal,
    utils_1.TSESTree.AST_NODE_TYPES.TemplateLiteral,
]);
exports.rule = {
    meta: {
        messages: {
            asFunction: 'Literal should not be used as function.',
            asTagFunction: 'Literal should not be used as tag function.',
        },
    },
    create(context) {
        const processNode = (node, messageId) => {
            if (NODES.has(node.type)) {
                context.report({
                    node,
                    messageId,
                });
            }
        };
        return {
            CallExpression(node) {
                processNode(node.callee, 'asFunction');
            },
            TaggedTemplateExpression(node) {
                processNode(node.tag, 'asTagFunction');
            },
        };
    },
};
//# sourceMappingURL=rule.js.map